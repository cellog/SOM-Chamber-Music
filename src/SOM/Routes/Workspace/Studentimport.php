<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Hook, PodioItem, PodioApp;
class Studentimport extends Route
{
    // not registered
    const ID = '6484201';
    const FIELD = '50394180';

    // registered
    const ID2 = '6484199';
    const FIELD2 = '50394162';
    
    // attendance
    const ATT_ID = '6505430';
    const ATT_FIELD = '50553204';

    // rehearsal class
    const REH_ID = '6521127';
    const REH_FIELD = '50670796';

    // registration
    const REG_ID = '6455277';
    const REG_FIELD = '50176892';

    protected $studentapp;
    protected $oldspaceid;
    protected $chamberapp;

    function __construct($attrs)
    {
        $this->studentapp = $attrs[0];
        $this->oldspaceid = $attrs[1];
        $this->chamberapp = $attrs[2];
    }

    function activate(SOM $som)
    {
        set_time_limit(0);
        // get old student app id
        $oldapp = PodioApp::get_for_url($this->oldspaceid, 'students', array('type' => 'micro'));
        $newapp = PodioApp::get($this->studentapp);
        $chamberapp = PodioApp::get($this->chamberapp);
        if ($newapp->url_label != 'students') {
            echo '<strong>ERROR</strong>: id passed in was not for a <strong>students</strong> app, but was for <strong>',
                 $newapp->config['name'], '</strong>';
            exit;
        }
        if ($oldapp->url_label != 'students') {
            echo '<strong>ERROR</strong>: id passed in was not for a <strong>students</strong> app, but was for <strong>',
                 $oldapp->config['name'], '</strong>';
            exit;
        }
        if ($chamberapp->url_label != 'chamber-groups') {
            echo '<strong>ERROR</strong>: id passed in was not for a <strong>chamber groups</strong> app, but was for <strong>',
                 $chamberapp->config['name'], '</strong>';
            exit;
        }
        // get new
        // download all existing students
        echo "downloading students...<br>";
        $students = PodioItem::filter($oldapp->app_id, array('limit' => 500));
        
        // prepare to upload
        foreach ($students['items'] as $student) {
            echo "Importing Student <strong>", $student->fields[0]->humanized_value(), '</strong><br>';
            // convert to new app, remove groups and set as inactive
            $student->app = $newapp;
            // reset item id
            $student->id = null;
            $fields = $student->fields;
            foreach ($student->fields as $i => $field) {
                if ($field->external_id == 'groups') {
                    $field->value = null;
                } elseif ($field->external_id == 'active') {
                    $field->set_value(2);
                } elseif ($field->external_id == 'ignore-count') {
                    unset($fields[$i]);
                }
            }
            $student->fields = $fields;
            $student->save();
        }
        echo "done, now updating references<br>";
        $field = PodioAppField::get(self::ID, self::FIELD);
        $field2 = PodioAppField::get(self::ID2, self::FIELD2);
        $field3 = PodioAppField::get(self::ATT_ID, self::ATT_FIELD);
        $field4 = PodioAppField::get(self::REH_ID, self::REH_FIELD);
        
        PodioAppField::update(self::ID, self::FIELD, $this->getConfig($field));
        PodioAppField::update(self::ID2, self::FIELD2, $this->getConfig($field2));
        PodioAppField::update(self::ATT_ID, self::ATT_FIELD, $this->getConfig($field3, false));
        PodioAppField::update(self::REH_ID, self::REH_FIELD, $this->getConfig($field4, false));
        echo 'Updated references in the Chamber Music Admin and Chamber Music Setup workspace to point to the new workspace';
    }

    function getConfig($field, $student = true)
    {
        $ret = array(
            'label' => $field->config['label'],
            'description' => $field->config['description'],
            'delta' => $field->config['delta'],
            'settings' => array(
                'referenceable_types' => array($student ? $this->studentapp : $this->chamberapp)
            ),
            'required' => true
        );
        if (!$ret['description']) unset ($ret['description']);
        return $ret;
    }
}

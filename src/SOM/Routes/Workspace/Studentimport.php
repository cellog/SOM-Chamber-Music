<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Hook, PodioItem, PodioApp, SOM\Model, PodioAppField, Chiara;
class Studentimport extends Route
{
    protected $studentapp;
    protected $oldspaceid;
    protected $chamberapp;

    function __construct($attrs)
    {
        $s = new Model\Students;
        $this->studentapp = $s->app->id;
        $s = new Model\ChamberGroups;
        $this->chamberapp = $s->app->id;
        $this->oldspaceid = $attrs[0];
    }

    function activate(SOM $som)
    {
        set_time_limit(0);
        // get old student app id
        $oldapp = PodioApp::get_for_url($this->oldspaceid, 'students', array('type' => 'micro'));
        if ($oldapp->url_label != 'students') {
            echo '<strong>ERROR</strong>: id passed in was not for a <strong>students</strong> app, but was for <strong>',
                 $oldapp->config['name'], '</strong>';
            exit;
        }
        // get new
        
        $id = new Model\StudentIdNumbers;
        $idapp = $id->app;
        $idapp->retrieve();
        $field = $idapp->fields['student'];
        
        $idindices = array();
        foreach ($idapp->filter->limit(500) as $sid) {
            $idindices[$sid->title] = $sid;
        }

        $sapp = new Model\Students;
        $sapp = $sapp->app;
        
        $existing = array();
        foreach ($sapp->filter->limit(500) as $st) {
            $existing[$st->title] = $st;
        }
        $sapp->retrieve();


        // change the app that the student ids to point to new students thing
        PodioAppField::update($idapp->id, $field->id, $this->getConfig($field));

        // download all existing students
        echo "downloading students...<br>";
        $s = new Chiara\PodioItem(array('app' => array('app_id' => $oldapp->id)));

        // prepare to upload
        foreach ($s->app->filter->limit(500) as $student) {
            echo "Importing Student <strong>", $student->fields['name'], '</strong><br>';
            $student->app_id = $this->studentapp;
            $name = (string) $student->fields['name'];
            if (!isset($existing[$name])) {
                // reset item id
                $student->id = null;
                // remove groups and set as inactive
                if (isset($student->fields['groups'])) {
                    $student->fields['groups'] = array();
                }
                $student->fields['active'] = 2;
                $student->save(array('hook' => false), true);
            } else {
                $student->id = $existing[$name]->id;
                echo "Student already exists, skipping<br>";
            }
            $studentid = new Model\StudentIdNumbers;
            if (isset($idindices[$name])) {
                echo "Updating Student ID link<br>";
                $studentid->id = $idindices[$name]->id;
                $studentid->retrieve();
            } else {
                echo "Creating Student ID link<br>";
                $studentid->fields['id-2'] = 1;
            }
            $studentid->fields['student'] = $student;
            $studentid->save(array('hook' => false));
        }
        echo "done, now updating references<br>";
        
        // attendance app
        PodioAppField::update(6505430, 50553204, array(
            'label' => "Absent student",
            'description' => null,
            'delta' => 0,
            'settings' => array(
                'referenceable_types' => $this->chamberapp
            ),
            'required' => true
        ));
        // groups rehearsal class
        PodioAppField::update(6521127, 50670796, array(
            'label' => "Group",
            'description' => null,
            'delta' => 0,
            'settings' => array(
                'referenceable_types' => $this->chamberapp
            ),
            'required' => true
        ));
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

<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Hook, PodioItem, PodioApp, SOM\Model;
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
        $this->oldspaceid = $attrs[1];
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
        $field = $idapp->fields['student'];

        // change the app that the student ids to point to new students thing
        PodioAppField::update($id->app->id, $field->id, $this->getConfig($field));

        // download all existing students
        echo "downloading students...<br>";
        $s = new Model\Students(array('app' => array('app_id' => $oldapp->id)));

        // prepare to upload
        foreach ($s->filter->limit(500) as $student) {
            echo "Importing Student <strong>", $student->fields['name'], '</strong><br>';
            $student->app_id = $this->studentapp;
            $studentid = $student->fields['student-id']->value;
            // reset item id
            $student->id = null;
            // remove groups and set as inactive
            $student->fields['groups'] = array();
            $student->fields['active'] = 2;
            $student->save();
            echo "Updating Student ID link<br>";
            $studentid->fields['student'] = $student;
            $studentid->save();
        }
        echo "done, now updating references<br>";
        
        $attendance = new Model\Attendance;
        $attapp = $attendance->app;
        
        $absentstudent = $attendance->fields['student'];

        $rehearsalclass = new Model\RehearsalClass;
        $rehapp = $rehearsalclass->app;

        $group = $rehapp->fields['group'];
        
        
        PodioAppField::update($attapp->id, $absentstudent->id, $this->getConfig($absentstudent, false));
        PodioAppField::update($rehapp->id, $group->id, $this->getConfig($group, false));
        echo 'Updated references in the Chamber Music Admin and Chamber Music Setup workspace to point to the new workspace';
    }

    function getConfig($field, $student = true)
    {
        $ret = array(
            'label' => $field->info['config']['label'],
            'description' => $field->info['config']['description'],
            'delta' => $field->info['config']['delta'],
            'settings' => array(
                'referenceable_types' => array($student ? $this->studentapp : $this->chamberapp)
            ),
            'required' => true
        );
        if (!$ret['description']) unset ($ret['description']);
        return $ret;
    }
}

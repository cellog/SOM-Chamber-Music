<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Hook, PodioItem, PodioApp;
class Studentimport extends Route
{
    protected $studentapp;
    protected $oldspaceid;

    function __construct($attrs)
    {
        $this->studentapp = $attrs[0];
        $this->oldspaceid = $attrs[1];
    }
    function activate(SOM $som)
    {
        // get old student app id
        $oldapp = PodioApp::get_for_url($this->oldspaceid, 'students', array('type' => 'micro'));
        $newapp = PodioApp::get($this->studentapp);
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
            foreach ($student->fields as $field) {
                if ($field->external_id == 'groups') {
                    $field->value = null;
                } elseif ($field->external_id == 'active') {
                    $field->set_value(2);
                }
            }
            $student->save();
        }
        echo "done";
    }
}

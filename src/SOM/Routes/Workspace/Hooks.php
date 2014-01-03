<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Hook, PodioHook, PodioApp, Podio;
class Hooks extends Route
{
    protected $spaceurl;

    function __construct($attrs)
    {
        $this->spaceurl = $attrs[0];
    }
    function activate(SOM $som)
    {
        $chambergroups = PodioApp::member(Podio::get('/app/org/unledu/space/' . $this->spaceurl . '/chamber-groups', array()));
        // find Students app
        $students = PodioApp::member(Podio::get('/app/org/unledu/space/' . $this->spaceurl . '/students', array()));

        $memberfield = $chambergroups->fields;
        foreach ($memberfield as $field) {
            if ($field->external_id == 'members') {
                $memberfield = $field->field_id;
                break;
            }
        }
        echo "Members field: " . $memberfield . "<br>";
        if (!isset($_POST) || !isset($_POST['chamber']) || !isset($_POST['student'])) {
            throw new \Exception('Invalid Request');
        }

        $newgroup = Hook::prepareUrl('newgroup', $chambergroups,
                                     $_POST['chamber'], $students,
                                     $_POST['student']);
        echo "Installing create group hook for chamber groups: <br><strong>", $newgroup,
             "</strong><br><pre>";
        $id = PodioHook::create('app_field', $memberfield, array('url' => $newgroup, 'type' => 'item.create'));
        PodioHook::verify($id[0]);
        echo "</pre>done<br>";

        $newgroup = Hook::prepareUrl('updategroup', $chambergroups,
                                     $_POST['chamber'], $students,
                                     $_POST['student']);
        echo "Installing update group hook for chamber groups: <strong>", $newgroup,
             "</strong><br>";

        $id = PodioHook::create('app_field', $memberfield, array('url' => $newgroup, 'type' => 'item.update'));
        PodioHook::verify($id[0]);
        echo "done<br>";
    }
}

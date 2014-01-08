<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Hook, PodioHook, PodioApp, Podio;
class Hooks extends Route
{
    protected $spaceurl;
    protected $oldspaceid;

    function __construct($attrs)
    {
        $this->spaceurl = $attrs[0];
        $this->oldspaceid = $attrs[1];
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
        PodioHook::create('app', $chambergroups->app_id, array('url' => $newgroup, 'type' => 'item.create'));
        echo "</pre>done<br>";

        $newgroup = Hook::prepareUrl('updategroup', $chambergroups,
                                     $_POST['chamber'], $students,
                                     $_POST['student']);
        echo "Installing update group hook for chamber groups: <strong>", $newgroup,
             "</strong><br>";

        PodioHook::create('app', $chambergroups->app_id, array('url' => $newgroup, 'type' => 'item.update'));
        echo "done<br>";

        echo "Removing create changes hooks<br>";
        $hooks = PodioHook::get_for('app', 6453745);
        foreach ($hooks as $hook) {
            $hook->delete($hook->id);
        }
        echo "done<br>";
        $newgroup = Hook::prepareUrl('changes', $students, $_POST['student']);
        echo "Installing create changes hook for students: <strong>", $newgroup,
             "</strong><br>";
        PodioHook::create('app', 6453745, array('url' => $newgroup, 'type' => 'item.create'));
        PodioHook::create('app', 6453745, array('url' => $newgroup, 'type' => 'item.update'));
        echo "done<br>";

        $newgroup = Hook::prepareUrl('registrategroup', $chambergroups, $_POST['chamber']);
        echo "Installing update group hook for chamber groups: <strong>", $newgroup,
             "</strong><br>";
        PodioHook::create('app', $chambergroups->app_id, array('url' => $newgroup, 'type' => 'item.update'));
        echo "done<br>";

        $newgroup = Hook::prepareUrl('updatestudent', $students, $_POST['student']);
        echo "Installing update group hook for students: <strong>", $newgroup,
             "</strong><br>";
        PodioHook::create('app', $students->app_id, array('url' => $newgroup, 'type' => 'item.update'));
        echo "done<br>";

        echo '<a href="/SOM-Chamber-Music/index.php/importstudents/', $students->app_id,
             '/', $this->oldspaceid, '/', $chambergroups->app_id,
             '">Continue (Student import)</a>';
    }
}

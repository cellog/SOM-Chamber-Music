<?php
namespace SOM\Routes\Workspace;
// this assumes we just successfully set up the model classes
use SOM\Route, SOM, SOM\Hook, PodioHook, PodioApp, Podio, SOM\Model,
    Chiara\HookServer;
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
        $chambergroups = new Model\ChamberGroups;
        $chambergroups = $chambergroups->app;
        
        $students = new Model\Students;
        $students = $students->app;

        /*
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
        */

        echo "Installing create student hook for setting ID numbers: <br><strong>", 
             "</strong><br><pre>";
        HookServer::$hookserver->setBaseUrl('http://chiaraquartet.net/SOM-Chamber-Music/hook.php');
        $students->createHook('item.create', 'newstudent');
        $students->createHook('item.update', 'updatestudent');
        /*
        PodioHook::create('app', $students->app_id, array('url' => 'http://chiaraquartet.net/SOM-Chamber-Music/hook.php/newstudent',
                                                          'type' => 'item.create'));
        */
        echo "</pre>done<br>";

        /*
        $newgroup = Hook::prepareUrl('newgroup', $chambergroups,
                                     $_POST['chamber'], $students,
                                     $_POST['student']);
        */
        echo "Installing create group hook for chamber groups: <br><strong>", 
             "</strong><br><pre>";
        $chambergroups->createHook('item.create', 'newgroup');
        /*
        PodioHook::create('app', $chambergroups->app_id, array('url' =>  'type' => 'item.create'));
        */
        echo "</pre>done<br>";

        /*
        $newgroup = Hook::prepareUrl('updategroup', $chambergroups,
                                     $_POST['chamber'], $students,
                                     $_POST['student']);
        */
        echo "Installing update group hook for chamber groups: <strong>", 
             "</strong><br>";

        $chambergroups->createHook('item.update', 'updategroup');
        /*
        PodioHook::create('app', $chambergroups->app_id, array('url' =>  'type' => 'item.update'));
        */
        echo "done<br>";

        /*
        $newgroup = Hook::prepareUrl('registrategroup', $chambergroups, $_POST['chamber']);
        */
        echo "Installing update group hook for chamber groups registration: <strong>", 
             "</strong><br>";
        $chambergroups->createHook('item.update', 'registrategroup');
        /*
        PodioHook::create('app', $chambergroups->app_id, array('url' =>  'type' => 'item.update'));
        */
        echo "done<br>";

        echo '<a href="/SOM-Chamber-Music/index.php/importstudents/', $this->oldspaceid,
             '">Continue (Student import)</a>';
    }
}

<?php
namespace SOM\Routes\Workspace;
// this assumes we just successfully set up the model classes
use SOM\Route, SOM, SOM\Hook, PodioHook, PodioApp, Podio, SOM\Model,
    Chiara\HookServer;
class Hooks extends Route
{
    protected $oldspaceid;

    function __construct($attrs)
    {
        $this->oldspaceid = $attrs[0];
    }

    function activate(SOM $som)
    {
        $chambergroups = new Model\ChamberGroups;
        $chambergroups = $chambergroups->app;
        
        $students = new Model\Students;
        $students = $students->app;

        echo "Installing create student hook for setting ID numbers: <br><strong>", 
             "</strong><br><pre>";
        HookServer::$hookserver->setBaseUrl('http://chiaraquartet.net/SOM-Chamber-Music/hook.php');
        $students->createHook('item.create', 'newstudent');
        $students->createHook('item.update', 'updatestudent');

        echo "</pre>done<br>";

        echo "Installing create group hook for chamber groups: <br><strong>", 
             "</strong><br><pre>";
        $chambergroups->createHook('item.create', 'newgroup');

        echo "</pre>done<br>";

        echo "Installing update group hook for chamber groups: <strong>", 
             "</strong><br>";

        $chambergroups->createHook('item.update', 'updategroup');
 
        echo "done<br>";


        echo "Installing update group hook for chamber groups registration: <strong>", 
             "</strong><br>";
        $chambergroups->createHook('item.update', 'registrategroup');

        echo "done<br>";

        echo '<a href="/SOM-Chamber-Music/index.php/importstudents/', $this->oldspaceid,
             '">Continue (Student import)</a>';
    }
}

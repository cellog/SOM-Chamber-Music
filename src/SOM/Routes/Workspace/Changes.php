<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Changes as c, SOM\Registration, SOM\Student;
class Changes extends Route
{
    function activate(SOM $som)
    {
        set_time_limit(0);
        $registration = new Registration(106472696);
        $registration->updateNewCallNumber();
        return;
        $registration = Registration::getAll();
        foreach ($registration as $reg) {
            $reg->updateNewCallNumber();
            if (!$reg->getChanges()) {
                echo $reg->getName(), " has no changes<br>";
            } else {
                echo $reg->getName(), " done<br>";
            }
        }
    }
}
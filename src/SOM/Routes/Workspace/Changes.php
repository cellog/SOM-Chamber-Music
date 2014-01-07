<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Changes as c, SOM\Registration, SOM\Student;
class Changes extends Route
{
    function activate(SOM $som)
    {
        set_time_limit(0);
        $students = Student::getAll(6468847);
        foreach ($students as $student) {
            $student->updateNewId();
            if (!count($student->getChanges())) {
                echo $student->getName(), ' ', $student->getIdNumber(), " has no changes<br>";
            } else {
                echo $student->getIdNumber(), " done<br>";
            }
        }
    }
}
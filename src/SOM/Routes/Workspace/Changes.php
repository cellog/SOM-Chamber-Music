<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Changes as c, SOM\Registration, SOM\Student;
class Changes extends Route
{
    function activate(SOM $som)
    {
        set_time_limit(0);
        Student::$App == 6468847;
        $students = Student::getAll();
        foreach ($students as $student) {
            $student->dump();
        }
    }
}
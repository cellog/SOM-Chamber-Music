<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Changes as c, SOM\Registration, SOM\Student;
class Changes extends Route
{
    function activate(SOM $som)
    {
        set_time_limit(0);
        $students = Student::getAll(6468847);
        echo '<pre>';
        foreach ($students as $student) {
            var_dump($student);
            $student->dump();
        }
    }
}
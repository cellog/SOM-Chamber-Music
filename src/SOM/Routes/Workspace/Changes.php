<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Changes as c, SOM\Registration, SOM\Student;
class Changes extends Route
{
    function activate(SOM $som)
    {
        $reg = new Registration(108764955);
        $reg->getChanges()->getStudent()->dump();
    }
}
<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Changes as c, SOM\Registration, SOM\Student;
class Changes extends Route
{
    function activate(SOM $som)
    {
        set_time_limit(0);
        $reg = new Registration(106472696);
        var_dump($reg->getCallNumber());
    }
}
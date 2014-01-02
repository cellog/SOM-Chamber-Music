<?php
namespace SOM\Routes;
use SOM\Route, SOM, SOM\Hook;
class Test extends Route
{
    function activate(SOM $som)
    {
        $_SERVER['PATH_INFO'] = null;
        $hook = new Hook();
        $members = $hook->testit(107924643);
        echo '<pre>';var_dump($members);
    }
}

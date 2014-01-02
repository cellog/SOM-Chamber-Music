<?php
namespace SOM\Routes;
use SOM\Route, SOM, SOM\Hook;
class Test extends Route
{
    function activate(SOM $som)
    {
        $hook = new Hook();
        $members = $hook->newgroup(106446524);
        echo '<pre>';var_dump($members);
    }
}

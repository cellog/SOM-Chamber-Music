<?php
namespace SOM\Routes;
use SOM\Route, SOM, PodioSpace;
class Home extends Route
{
    function activate(SOM $som)
    {
        $spaces = PodioSpace::get_for_org($som->getOrg());
        foreach ($spaces as $space) {
            if (false !== strpos($space->name, 'SOM: Chamber Music')) {
                $space = new SOM\Workspace($space);
                echo $this->linkTo($space) . '<br>'; // hack to get started
            }
        }
    }
}

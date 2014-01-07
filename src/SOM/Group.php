<?php
namespace SOM;
use PodioItem;
class Group extends StudentBase
{
    function update()
    {
        $reg = $this->getRegistrations();
        foreach ($reg as $r) {
            $r->update();
        }
    }
}

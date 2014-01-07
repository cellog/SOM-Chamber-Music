<?php
namespace SOM;
use PodioItem;
class Registration extends Podio
{
    function getStudent()
    {
        $this->retrieve();
        
    }

    function getChanges()
    {
        $this->retrieve();
        $info = $this->item->get_references($this->id);
        $changes = new Changes;
        $changes->fromReference($info);
        return $changes;
    }
}

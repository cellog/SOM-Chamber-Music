<?php
namespace SOM;
use PodioItem;
class Changes extends Podio
{
    function fromReference($info)
    {
        $this->retrieve($info[0]['items']['item_id']);
    }

    function getStudent()
    {
        $this->retrieve();
        
    }

    function getRegistration()
    {
        
    }
}

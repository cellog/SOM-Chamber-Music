<?php
namespace SOM;
use PodioItem;
class Changes extends Podio
{
    const APP_ID = 6453745;
    function fromReference($info)
    {
        $this->retrieve($info[0]['items'][0]['item_id']);
    }

    function getStudent()
    {
        $this->retrieve();
        
    }

    function getRegistration()
    {
        $regid = $this->getFieldValue(50175556);
        echo '<pre>';
        var_dump(array_keys($regid['value']));
        return new Registration($regid['value'][0]['item_id']);
    }
}

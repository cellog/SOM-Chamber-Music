<?php
namespace SOM;
use PodioItem;
class Changes extends Podio
{
    const APP_ID = 6453745;

    function getStudent()
    {
        $ret = $this->getRegistration()->getStudent();
        if ($ret) {
            $ret->setChanges($this);
        }
        return $ret;
    }

    function getRegistration($noretrieve = false)
    {
        $this->retrieve(null, true);
        $regid = $this->getFieldValue(50175556);
        $ret = new Registration($regid['value']['item_id'], $noretrieve);
        $ret->setChanges($this);
    }

    function update()
    {
        $this->getRegistration()->updateNewCallNumber();
        $this->getStudent()->updateNewId();
    }
}

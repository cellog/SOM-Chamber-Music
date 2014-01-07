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
        return $this->getRegistration()->getStudent();
    }

    function getRegistration()
    {
        $this->retrieve(null, true);
        $regid = $this->getFieldValue(50175556);
        return new Registration($regid['value']['item_id']);
    }

    function update()
    {
        $this->getRegistration()->updateNewCallNumber();
        $this->getStudent()->updateNewId();
    }
}

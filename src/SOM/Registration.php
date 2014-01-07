<?php
namespace SOM;
use PodioItem;
class Registration extends Podio
{
    const APP_ID = 50394170;
    function getStudent()
    {
        $this->retrieve(null, true);
        $regid = $this->getFieldValue(50394170);
        $intermediate = new Registration($regid['value']['item_id']); // dummy
        return $intermediate;
        $student = $intermediate->getFieldValue('student');
        return new Student($student['value']['item_id']);
    }

    function getChanges()
    {
        $this->retrieve(null, true);
        $info = $this->item->get_references($this->id);
        $changes = new Changes;
        $changes->fromReference($info);
        return $changes;
    }
}

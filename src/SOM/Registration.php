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
        $intermediate = new Registration($regid['value']['item_id']); // dummy for registered/not registered students
        $student = $intermediate->getFieldValue('student');
        return new Student($student['value']['item_id']); // here is the real student
    }

    function getChanges()
    {
        $this->retrieve(null, true);
        $info = $this->item->get_references($this->id);
        if (!isset($info[0]) || !isset($info[0]['items'][0])) {
            return false;
        }
        $changes = new Changes;
        $changes->fromReference($info);
        return $changes;
    }

    function fromReference($info)
    {
        $this->retrieve($info[0]['items'][0]['item_id']);
    }

    function getCallNumber()
    {
        $id = $this->getFieldValue('call-number');
        $id = $id['value'];
        $id += 0;
        $id = (int) $id;
        $id = '' . $id;
        if (strlen($id) == 7) {
            $id = "0$id";
        }
        return $id;
    }
}

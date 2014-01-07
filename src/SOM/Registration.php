<?php
namespace SOM;
use PodioItem;
class Registration extends Podio
{
    protected $changes = false;
    const APP_ID = 50394170;
    function getStudent()
    {
        $this->retrieve(null, true);
        $regid = $this->getFieldValue(50394170);
        $intermediate = new Registration($regid['value']['item_id']); // dummy for registered/not registered students
        $student = $intermediate->getFieldValue('student');
        return new Student($student['value']['item_id']); // here is the real student
    }

    function getChanges($reset = false)
    {
        if ($reset) {
            $this->changes = false;
        }
        if (false !== $this->changes) {
            return $this->changes;
        }
        $this->retrieve(null, true);
        $info = $this->item->get_references($this->id);
        if (!isset($info[0]) || !isset($info[0]['items'][0])) {
            $this->changes = null;
            return false;
        }
        $changes = new Changes;
        $changes->fromReference($info);
        $this->changes = $changes;
        return $changes;
    }

    function fromReference($info)
    {
        $this->retrieve($info[0]['items'][0]['item_id']);
    }

    function updateNewCallNumber()
    {
        $id = $this->getCallNumber();
        $change = $this->getChanges();
        if ($change) {
            $change->setFieldValue(51102122, $id);
        }
    }

    function getCallNumber()
    {
        $id = $this->getFieldValue(50178337);
        $id = $id['value'];
        $id += 0;
        $id = (int) $id;
        return "$id";
    }
}

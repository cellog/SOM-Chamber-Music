<?php
namespace SOM;
use PodioItem;
class Registration extends Podio
{
    protected $changes = false;
    const APP_ID = 6455277;
    function getStudent()
    {
        $this->retrieve(null, true);
        $regid = $this->getFieldValue(50394170);
        $intermediate = new Registration($regid['value']['item_id']); // dummy for registered/not registered students
        $student = $intermediate->getFieldValue('student');
        return new Student($student['value']['item_id']); // here is the real student
    }

    function getRegistrations()
    {
        $info = $this->getReferences();
        foreach ($info[0]['items'] as $item) {
            $ret[] = new Registration($item['item_id']);
        }
        return $ret;
    }

    function getChanges($noretrieve = false, $reset = false)
    {
        if ($reset) {
            $this->changes = false;
        }
        if (false !== $this->changes) {
            return $this->changes;
        }
        $this->retrieve(null, true);
        $info = $this->getReferences();
        if (!isset($info[0]) || !isset($info[0]['items'][0])) {
            $this->changes = null;
            return false;
        }
        $changes = new Changes;
        $changes->fromReference($info, $noretrieve);
        $this->changes = $changes;
        return $changes;
    }

    function updateNewCallNumber()
    {
        $id = $this->getCallNumber();
        $change = $this->getChanges();
        if ($change) {
            $change->setFieldValue(51102122, $id);
        }
    }

    function update()
    {
        $this->updateNewCallNumber();
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

<?php
namespace SOM;
use PodioItem;
class Registration extends Podio
{
    protected $changes = false;
    protected $intermediate = false;
    protected $student = false;
    protected $registeredclass = false;
    const APP_ID = 6455277;
    function getStudent($noretrieve = false)
    {
        if ($this->student) {
            return $this->student;
        }
        $this->retrieve(null, true);
        
        $intermediate = $this->getRegisteredStudent();
        if ($noretrieve) return;
        return $this->student = $intermediate->getStudent($noretrieve);
    }

    function isRegisteredStudent()
    {
        $this->retrieve(null, true);
        $student = $this->getFieldValue('student');
        $this->log(var_export($student, 1));
        return $student['app']['app_id'] == 6484199;
    }

    function getRegisteredStudent($noretrieve = false)
    {
        if ($this->intermediate) {
            return $this->intermediate;
        }
        $this->retrieve(null, true);
        if ($this->isRegisteredStudent()) {
            $class = __NAMESPACE__ . '\\RegisteredStudent';
        } else {
            $class = __NAMESPACE__ . '\\UnregisteredStudent';
        }
        $regid = $this->getFieldValue(50394170);
        $this->intermediate = new $class($regid['value']['item_id'], $noretrieve);
        return $this->intermediate;
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

    function setChanges($changes)
    {
        $this->changes = $changes;
    }
    
    function updateNewCallNumber()
    {
        $id = $this->getCallNumber();
        $change = $this->getChanges();
        if ($change) {
            $change->setNewClass($id);
        }
    }

    function updateCurrentClass()
    {
        $currentclass = $this->intermediate->getCurrentClass();
        $change = $this->getChanges();
        if ($change) {
            $change->setCurrentClass($currentclass);
        }
    }

    function update()
    {
        $this->updateNewCallNumber();
        $this->updateCurrentClass();
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

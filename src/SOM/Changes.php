<?php
namespace SOM;
use PodioItem;
class Changes extends Podio
{
    const APP_ID = 6453745;
    protected $registration = null;

    function getStudent($noretrieve = false)
    {
        $ret = $this->getRegistration()->getStudent($noretrieve);
        if ($ret) {
            $ret->setChanges($this);
        }
        return $ret;
    }

    function getRegistration($noretrieve = false)
    {
        if ($this->registration) {
            return $this->registration;
        }
        $this->retrieve(null, true);
        $regid = $this->getFieldValue(50175556);
        $ret = new Registration($regid['value']['item_id'], $noretrieve);
        $ret->setChanges($this);
        $this->registration = $ret;
        return $ret;
    }

    function update()
    {
        $this->getRegistration()->update();
    }

    function setCurrentClass($value)
    {
        $this->setFieldValue(51227136, $value);
    }

    function setNewClass($value)
    {
        $this->setFieldValue(51102122, $value);
    }

    function setIDNumber($number)
    {
        $this->setFieldValue(51102121, $number);
    }

    function saveNew($regid)
    {
        PodioItem::create(self::APP_ID, array('fields' =>
                                              array(
                                                        'student' => (int) $id
                                                   )));
    }
}

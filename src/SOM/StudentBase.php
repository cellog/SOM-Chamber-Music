<?php
namespace SOM;
use PodioItem;
abstract class StudentBase extends Podio
{
    protected $registrations = null;
    protected $changes = false;

    function setRegistrations(array $registrations)
    {
        $this->registrations = $registrations;
    }

    function getChanges()
    {
        if ($this->changes !== false) {
            return $this->changes;
        }
        $ret = array();
        foreach ($this->getRegistrations() as $reg) {
            $ret[] = $reg->getChanges();
        }
        $this->changes = array_filter($ret);
        return $this->changes;
    }
}

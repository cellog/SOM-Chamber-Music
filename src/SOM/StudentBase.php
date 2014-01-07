<?php
namespace SOM;
use PodioItem;
abstract class StudentBase extends Podio
{
    protected $registrations = null;
    protected $changes = false;
    function getRegistrations($noretrieve = false)
    {
        if ($this->registrations) {
            return $this->registrations;
        }
        $this->retrieve(null, true);
        foreach ($this->getReferences() as $reference) {
            if ($reference['field']['external_id'] == 'student') {
                $reg = new Registration($reference['items'][0]['item_id'], $noretrieve); // dummy, for registered/not registered student
                $ret = array();
                if ($noretrieve) {
                    return $reg;
                }
                $info = $reg->getReferences();
                foreach ($info[0]['items'] as $item) {
                    $ret[] = new Registration($item['item_id']);
                }
                return $ret;
            }
        }
        return array();
    }

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

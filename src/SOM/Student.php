<?php
namespace SOM;
use PodioItem;
class Student extends Podio
{
    protected $changes = false;
    function getRegistrations()
    {
        $this->retrieve(null, true);
        $info = $this->item->get_references($this->id);
        foreach ($info as $reference) {
            if ($reference['field']['external_id'] == 'student') {
                $reg = new Registration($reference['items'][0]['item_id']); // dummy, for registered/not registered student
                $ret = array();
                $info = $reg->getReferences();
                foreach ($info[0]['items'] as $item) {
                    $ret[] = new Registration($item['item_id']);
                }
                return $ret;
            }
        }
        return array();
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

    function updateNewId()
    {
        $id = $this->getIdNumber();
        foreach ($this->getChanges() as $change) {
            $change->setFieldValue('student-id-3', $id);
        }
    }

    function getName()
    {
        return $this->item->title;
    }

    function getIdNumber()
    {
        $id = $this->getFieldValue('id-number');
        $id = $id['value'];
        $id += 0;
        $id = (int) $id;
        $id = '' . $id;
        if (strlen($id) == 7) {
            $id = "0$id";
        }
        return $id;
    }

    function dump()
    {
        echo $this->getIdNumber() . '<br>';
    }
}

<?php
namespace SOM;
use PodioItem;
class Student extends Podio
{
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
        $ret = array();
        foreach ($this->getRegistrations() as $reg) {
            $ret[] = $reg->getChanges();
        }
        return $ret;
    }

    function updateNewId()
    {
        $id = $this->getIdNumber();
        $this->setFieldValue('id-number-2', $id);
        foreach ($this->getChanges() as $change) {
            $change->setFieldValue('student-id-3', $id);
        }
    }

    function getIdNumber()
    {
        $id = $this->getFieldValue('id-number');
        $id = $id['value'];
        $id += 0;
        $id = (int) $id;
        $id = '' . $id;
        if (strlen($id) == 8) {
            $id = "0$id";
        }
        return $id;
    }
}

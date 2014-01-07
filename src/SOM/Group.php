<?php
namespace SOM;
use PodioItem;
class Group extends Podio
{
    protected $changes = false;
    function getRegistrations()
    {
        $this->retrieve(null, true);
        $info = $this->item->get_references($this->id);
        foreach ($info as $reference) {
            if ($reference['field']['external_id'] == 'group') {
                $reg = new Registration($reference['items'][0]['item_id']); // dummy, for registered/not registered student
                return array($reg);
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

    function update()
    {
        $reg = $this->getRegistrations();
        $reg[0]->update();
    }
}

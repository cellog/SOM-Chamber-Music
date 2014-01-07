<?php
namespace SOM;
use PodioItem;
class Group extends StudentBase
{
    function getRegistrations($noretrieve = false)
    {
        if ($this->registrations) {
            return $this->registrations;
        }
        $this->retrieve(null, true);
        foreach ($this->getReferences() as $reference) {
            if ($reference['field']['field_id'] == 50176892) {
                $ret = array();
                foreach ($reference['items'] as $item) {
                    $ret[] = new Registration($item['item_id'], $noretrieve);
                }
                return $ret;
            }
        }
        return array();
    }

    function update()
    {
        $reg = $this->getRegistrations();
        foreach ($reg as $r) {
            $r->update();
        }
    }
}

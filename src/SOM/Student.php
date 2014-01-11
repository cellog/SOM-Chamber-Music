<?php
namespace SOM;
use PodioItem;
class Student extends StudentBase
{
    function getStudentID()
    {
        $this->retrieve(null, true);
        foreach ($this->getReferences() as $reference) {
            if ($reference['field']['external_id'] == 'student') {
                $id = new StudentID($reference['items'][0]['item_id']);
                return $id;
            }
        }
    }

    function getID()
    {
        $this->retrieve(null, true);
        return $this->item->id;
    }
}

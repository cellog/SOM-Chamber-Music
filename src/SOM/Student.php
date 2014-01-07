<?php
namespace SOM;
use PodioItem;
class Student extends StudentBase
{
    function updateNewId()
    {
        $id = $this->getIdNumber();
        foreach ($this->getChanges() as $change) {
            $change->setFieldValue('student-id-3', $id);
        }
    }

    function update()
    {
        $this->updateNewId();
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

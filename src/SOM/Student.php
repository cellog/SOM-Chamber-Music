<?php
namespace SOM;
use PodioItem;
class Student extends StudentBase
{
    const APP_ID = 6618817;
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

    function updateNewId()
    {
        $id = $this->getIdNumber();
        foreach ($this->getChanges() as $change) {
            $change->setFieldValue('id-2', $id);
        }
    }

    function saveNew($id)
    {
        PodioItem::create(self::APP_ID, array('fields' =>
                                              array(
                                                        'student' => $id,
                                                        'id-2' => 1
                                                   )), array('hook' => false));
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

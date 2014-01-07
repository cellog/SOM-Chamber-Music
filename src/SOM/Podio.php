<?php
namespace SOM;
use PodioItem, PodioItemField;
class Podio
{
    const APP_ID = 0;
    protected $id = null;
    protected $item = null;
    function __construct($id = null)
    {
        $this->retrieve($id);
    }

    function retrieve($id = null, $exception = false)
    {
        if ($this->id) {
            return;
        }
        if (!$id) {
            if ($exception) {
                throw new \Exception('Unknown id');
            }
            return;
        }
        $this->id = $id;
        $this->item = PodioItem::get($id);
    }

    function getField($extname)
    {
        foreach ($this->item->fields as $field) {
            if ($field->external_id == $extname || $field->id == $extname) {
                return $field;
            }
        }
        return null;
    }

    function getReferences()
    {
        $this->retrieve(null, true);
        return $this->item->get_references($this->id);
    }

    // this assumes we have a single value in this field
    function getFieldValue($extname)
    {
        $field = $this->getField($extname);
        if ($field === null) {
            return $field;
        }
        return $field->values[0];
    }

    // this assumes we are only setting the value of a text field
    function setFieldValue($fieldname, $values)
    {
        $this->retrieve(null, true);
        $field = $this->getField($fieldname);
        if ($field) {
            $field->set_value($values);
            $field->save();
        } else {
            PodioItemField::update($this->id, $fieldname, is_array($values) ?
                                   array(array('value' => $values[0])) :
                                   array(array('value' => $values)));
        }
    }

    static function getAll($app = null)
    {
        if (!$app) {
            if (static::APP_ID) {
                $app = static::APP_ID;
            } else {
                throw new \Exception('no app id set');
            }
        }
        return PodioItem::filter($app, array(
            'limit' => 500,
        ));
    }

    function dump()
    {
        echo '<pre>';
        var_dump($this->item);
    }
}

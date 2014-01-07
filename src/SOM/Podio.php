<?php
namespace SOM;
use PodioItem, PodioItemField, Podio as p, PodioLogger;
class Podio
{
    const APP_ID = 0;
    protected $id = null;
    protected $item = null;
    protected $references = false;
    function __construct($id = null, $noretrieve = false)
    {
        $this->retrieve($id);
    }

    function fromItem(PodioItem $item)
    {
        $this->item = $item;
        $this->id = $item->id;
    }

    function retrieve($id = null, $exception = false, $noretrieve = false)
    {
        if ($this->id && $this->item) {
            return;
        }
        if (!$id) {
            $id = $this->id;
        }
        if (!$id) {
            if ($exception) {
                throw new \Exception('Unknown id');
            }
            return;
        }
        $this->id = $id;
        if ($noretrieve) return;
        $this->item = PodioItem::get($id);
    }

    function getReferences()
    {
        if (!$this->references) {
            $this->retrieve(null, true);
            $this->references = $this->item->get_references($this->id);
        }
        return $this->references;
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

    function fromReference($info, $noretrieve = false)
    {
        $this->retrieve($info[0]['items'][0]['item_id'], false, $noretrieve);
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
        $ret = PodioItem::filter($app, array(
            'limit' => 500,
        ));
        $ret = $ret['items'];
        $class = get_called_class();
        foreach ($ret as $i => $item) {
            $ret[$i] = new $class();
            $ret[$i]->fromItem($item);
        }
        return $ret;
    }

    function getName()
    {
        return $this->item->title;
    }

    function dump()
    {
        echo '<pre>';
        var_dump($this->item);
    }

    function log($text)
    {
        if (!p::$logger) {
            p::$logger = new PodioLogger();
        }
        p::$logger->log("\n\n" . $text . "\n\n");
    }
}

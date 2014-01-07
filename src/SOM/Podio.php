<?php
namespace SOM;
use PodioItem;
class Podio
{
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

    function dump()
    {
        echo '<pre>';
        var_dump($this->item);
    }
}

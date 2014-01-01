<?php
namespace SOM;
use SOM, PodioSpace;
class Workspace
{
    protected $podioObject;
    function __construct($obj)
    {
        if (!($obj instanceof PodioSpace)) {
            $obj = PodioSpace::get($obj);
        }
        $this->podioObject = $obj;
    }

    function name()
    {
        return $this->podioObject->name;
    }

    function id()
    {
        return $this->podioObject->space_id;
    }

    function link(SOM $parent)
    {
        return $parent->path() . '/workspace/' . $this->id();
    }
}

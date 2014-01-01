<?php
namespace SOM;
use SOM, PodioSpace;
class Workspace
{
    protected $podioObject;
    function __construct(PodioSpace $obj)
    {
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

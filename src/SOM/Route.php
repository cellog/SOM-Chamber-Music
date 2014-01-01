<?php
namespace SOM;
use SOM;
abstract class Route
{
    protected $params;
    function __construct(Array $params = array())
    {
        $this->params = $params;
    }
    abstract function activate(SOM $som);
}

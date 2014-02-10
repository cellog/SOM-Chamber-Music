<?php
namespace SOM\Model\Item;
class Registered extends \Chiara\PodioItem
{
    const MYAPPID=6484199;
    function __construct($info = null, $retrieve = true)
    {
        parent::__construct($info, new \SOM\Model\Registered, $retrieve);
    }
}

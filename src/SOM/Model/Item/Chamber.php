<?php
namespace SOM\Model\Item;
class Chamber extends \Chiara\PodioItem
{
    const MYAPPID=6468849;
    function __construct($info = null, $retrieve = true)
    {
        parent::__construct($info, new \SOM\Model\Chamber, $retrieve);
    }
}

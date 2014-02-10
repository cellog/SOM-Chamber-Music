<?php
namespace SOM\Model\Item;
class Changes extends \Chiara\PodioItem
{
    const MYAPPID=6453745;
    function __construct($info = null, $retrieve = true)
    {
        parent::__construct($info, new \SOM\Model\Changes, $retrieve);
    }
}

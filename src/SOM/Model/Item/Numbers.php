<?php
namespace SOM\Model\Item;
class Numbers extends \Chiara\PodioItem
{
    const MYAPPID=6454935;
    function __construct($info = null, $retrieve = true)
    {
        parent::__construct($info, new \SOM\Model\Numbers, $retrieve);
    }
}

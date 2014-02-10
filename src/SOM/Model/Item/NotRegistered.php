<?php
namespace SOM\Model\Item;
class NotRegistered extends \Chiara\PodioItem
{
    const MYAPPID=6484201;
    function __construct($info = null, $retrieve = true)
    {
        parent::__construct($info, new \SOM\Model\NotRegistered, $retrieve);
    }
}

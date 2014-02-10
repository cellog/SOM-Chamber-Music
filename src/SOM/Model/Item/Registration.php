<?php
namespace SOM\Model\Item;
class Registration extends \Chiara\PodioItem
{
    const MYAPPID=6455277;
    function __construct($info = null, $retrieve = true)
    {
        parent::__construct($info, new \SOM\Model\Registration, $retrieve);
    }
}

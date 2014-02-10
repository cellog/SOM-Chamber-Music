<?php
namespace SOM\Model\Item;
class StudentIDs extends \Chiara\PodioItem
{
    const MYAPPID=6618817;
    function __construct($info = null, $retrieve = true)
    {
        parent::__construct($info, new \SOM\Model\StudentIDs, $retrieve);
    }
}

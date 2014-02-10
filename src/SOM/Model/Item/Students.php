<?php
namespace SOM\Model\Item;
class Students extends \Chiara\PodioItem
{
    const MYAPPID=6468847;
    function __construct($info = null, $retrieve = true)
    {
        parent::__construct($info, new \SOM\Model\Students, $retrieve);
    }
}

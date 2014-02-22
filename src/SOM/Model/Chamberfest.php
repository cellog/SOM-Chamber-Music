<?php
namespace SOM\Model;
class Chamberfest extends \Chiara\PodioItem
{
    protected $MYAPPID=6474712;
    function __construct($info = null, $retrieve = true)
    {
        parent::__construct($info, new \SOM\Model\Structure\Chamberfest, $retrieve);
    }

    /**
     * handle an item.create hook in here
     * @param array $params any url-specific parameters passed in to
     *                       differentiate between hooks.  The item is already set up
     *                       and can be used immediately.
     */
    /*
    function onItemCreate($params)
    function onItemUpdate($params)
    function onItemDelete($params)
    function onCommentCreate($params)
    function onCommentDelete($params)
    function onFileChange($params)
    {
    }
    */
}

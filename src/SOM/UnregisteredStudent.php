<?php
namespace SOM;
use PodioItem;
class UnregisteredStudent extends RegisteredStudent
{
    const APP_ID = 6484201;

    function getCurrentClass($noretrieve = false)
    {
        return '(Not Registered)';
    }
}

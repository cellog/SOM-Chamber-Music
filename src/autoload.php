<?php
function myAutoload($class)
{
    if (-1 == strpos($class, 'SOM')) return;
    include __DIR__ . str_replace('\\', '/', $class) . '.php';
}
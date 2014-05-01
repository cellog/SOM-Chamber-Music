<?php
namespace SOM\Model\Structure;
class Coaches extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "1733183/6455124";
    protected $structure = array (
      'contact' => 
      array (
        'type' => 'contact',
        'name' => 'contact',
        'id' => 50175721,
        'config' => 'space_contacts',
      ),
      50175721 => 
      array (
        'type' => 'contact',
        'name' => 'contact',
        'id' => 50175721,
        'config' => 'space_contacts',
      ),
      50175723 => 
      array (
        'type' => 'number',
        'name' => 'section',
        'id' => 50175723,
        'config' => NULL,
      ),
      'section' => 
      array (
        'type' => 'number',
        'name' => 'section',
        'id' => 50175723,
        'config' => NULL,
      ),
      'podio-link-to-coach' => 
      array (
        'type' => 'contact',
        'id' => 'podio-link-to-coach',
        'name' => 50175722,
        'config' => 'space_users',
      ),
      50175722 => 
      array (
        'type' => 'contact',
        'name' => 'podio-link-to-coach',
        'id' => 50175722,
        'config' => 'space_users',
      ),
    );
}

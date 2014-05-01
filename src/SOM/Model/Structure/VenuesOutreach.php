<?php
namespace SOM\Model\Structure;
class VenuesOutreach extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "1748422/6505399";
    protected $structure = array (
      50552970 => 
      array (
        'type' => 'text',
        'name' => 'location',
        'id' => 50552970,
        'config' => NULL,
      ),
      'location' => 
      array (
        'type' => 'text',
        'name' => 'location',
        'id' => 50552970,
        'config' => NULL,
      ),
      50552971 => 
      array (
        'type' => 'location',
        'name' => 'address',
        'id' => 50552971,
        'config' => NULL,
      ),
      'address' => 
      array (
        'type' => 'location',
        'name' => 'address',
        'id' => 50552971,
        'config' => NULL,
      ),
      'has-piano' => 
      array (
        'type' => 'category',
        'name' => 'has-piano',
        'id' => 50552972,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Piano',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'No Piano',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50552972 => 
      array (
        'type' => 'category',
        'name' => 'has-piano',
        'id' => 50552972,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Piano',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'No Piano',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      'contact' => 
      array (
        'type' => 'contact',
        'name' => 'contact',
        'id' => 50552973,
        'config' => 'space_contacts',
      ),
      50552973 => 
      array (
        'type' => 'contact',
        'name' => 'contact',
        'id' => 50552973,
        'config' => 'space_contacts',
      ),
    );
}

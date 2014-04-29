<?php
namespace SOM\Model\Structure;
class HonorsChamberfest extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "2178086/7907973";
    protected $structure = array (
      'group' => 
      array (
        'type' => 'app',
        'name' => 'group',
        'id' => 61298796,
        'config' => 
        array (
          0 => 7907978,
        ),
      ),
      61298796 => 
      array (
        'type' => 'app',
        'name' => 'group',
        'id' => 61298796,
        'config' => 
        array (
          0 => 7907978,
        ),
      ),
      'coach' => 
      array (
        'type' => 'contact',
        'name' => 'coach',
        'id' => 61298797,
        'config' => 'all_users',
      ),
      61298797 => 
      array (
        'type' => 'contact',
        'name' => 'coach',
        'id' => 61298797,
        'config' => 'all_users',
      ),
      'audition-time' => 
      array (
        'type' => 'date',
        'name' => 'audition-time',
        'id' => 61298798,
        'config' => NULL,
      ),
      61298798 => 
      array (
        'type' => 'date',
        'name' => 'audition-time',
        'id' => 61298798,
        'config' => NULL,
      ),
      'the-audition-is-exactly-10-minutes-maximum' => 
      array (
        'type' => 'category',
        'name' => 'the-audition-is-exactly-10-minutes-maximum',
        'id' => 61298799,
        'config' => 
        array (
          'options' => 
          array (
          ),
          'multiple' => false,
        ),
      ),
      61298799 => 
      array (
        'type' => 'category',
        'name' => 'the-audition-is-exactly-10-minutes-maximum',
        'id' => 61298799,
        'config' => 
        array (
          'options' => 
          array (
          ),
          'multiple' => false,
        ),
      ),
      'composer' => 
      array (
        'type' => 'text',
        'name' => 'composer',
        'id' => 61298800,
        'config' => NULL,
      ),
      61298800 => 
      array (
        'type' => 'text',
        'name' => 'composer',
        'id' => 61298800,
        'config' => NULL,
      ),
      'piece-and-movements' => 
      array (
        'type' => 'text',
        'name' => 'piece-and-movements',
        'id' => 61298801,
        'config' => NULL,
      ),
      61298801 => 
      array (
        'type' => 'text',
        'name' => 'piece-and-movements',
        'id' => 61298801,
        'config' => NULL,
      ),
      'status' => 
      array (
        'type' => 'category',
        'name' => 'status',
        'id' => 61298802,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Registered',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Chosen',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      61298802 => 
      array (
        'type' => 'category',
        'name' => 'status',
        'id' => 61298802,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Registered',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Chosen',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
    );
}

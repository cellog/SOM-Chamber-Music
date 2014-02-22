<?php
namespace SOM\Model\Structure;
class HonorsChamberfest extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "1737212/6498176";
    protected $structure = array (
      'group' => 
      array (
        'type' => 'app',
        'name' => 'group',
        'id' => 50499843,
        'config' => 
        array (
          0 => 6468849,
        ),
      ),
      50499843 => 
      array (
        'type' => 'app',
        'name' => 'group',
        'id' => 50499843,
        'config' => 
        array (
          0 => 6468849,
        ),
      ),
      'coach' => 
      array (
        'type' => 'contact',
        'name' => 'coach',
        'id' => 53318902,
        'config' => 'all_users',
      ),
      53318902 => 
      array (
        'type' => 'contact',
        'name' => 'coach',
        'id' => 53318902,
        'config' => 'all_users',
      ),
      53318903 => 
      array (
        'type' => 'date',
        'name' => 53318903,
        'id' => 'audition-time',
        'config' => NULL,
      ),
      'audition-time' => 
      array (
        'type' => 'date',
        'name' => 53318903,
        'id' => 'audition-time',
        'config' => NULL,
      ),
      'the-audition-is-exactly-10-minutes-maximum' => 
      array (
        'type' => 'question',
        'name' => 'the-audition-is-exactly-10-minutes-maximum',
        'id' => 50499844,
        'config' => 
        array (
          'options' => 
          array (
          ),
          'multiple' => false,
        ),
      ),
      50499844 => 
      array (
        'type' => 'question',
        'name' => 'the-audition-is-exactly-10-minutes-maximum',
        'id' => 50499844,
        'config' => 
        array (
          'options' => 
          array (
          ),
          'multiple' => false,
        ),
      ),
      50499845 => 
      array (
        'type' => 'text',
        'name' => 50499845,
        'id' => 'composer',
        'config' => NULL,
      ),
      'composer' => 
      array (
        'type' => 'text',
        'name' => 50499845,
        'id' => 'composer',
        'config' => NULL,
      ),
      50499846 => 
      array (
        'type' => 'text',
        'name' => 50499846,
        'id' => 'piece-and-movements',
        'config' => NULL,
      ),
      'piece-and-movements' => 
      array (
        'type' => 'text',
        'name' => 50499846,
        'id' => 'piece-and-movements',
        'config' => NULL,
      ),
      'status' => 
      array (
        'type' => 'category',
        'name' => 'status',
        'id' => 50499847,
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
      50499847 => 
      array (
        'type' => 'category',
        'name' => 'status',
        'id' => 50499847,
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

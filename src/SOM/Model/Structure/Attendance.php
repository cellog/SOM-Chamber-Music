<?php
namespace SOM\Model\Structure;
class Attendance extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "1748422/6505430";
    protected $structure = array (
      'absent-student' => 
      array (
        'type' => 'app',
        'name' => 'absent-student',
        'id' => 50553204,
        'config' => 
        array (
          0 => 6468847,
        ),
      ),
      50553204 => 
      array (
        'type' => 'app',
        'name' => 'absent-student',
        'id' => 50553204,
        'config' => 
        array (
          0 => 6468847,
        ),
      ),
      'masterclass' => 
      array (
        'type' => 'app',
        'name' => 'masterclass',
        'id' => 50553203,
        'config' => 
        array (
          0 => 6505403,
          1 => 6558188,
        ),
      ),
      50553203 => 
      array (
        'type' => 'app',
        'name' => 'masterclass',
        'id' => 50553203,
        'config' => 
        array (
          0 => 6505403,
          1 => 6558188,
        ),
      ),
      'excused' => 
      array (
        'type' => 'category',
        'name' => 'excused',
        'id' => 50962122,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Not Excused',
              'id' => 1,
              'color' => 'F7D1D0',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Excused (by Chiara Member directly)',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50962122 => 
      array (
        'type' => 'category',
        'name' => 'excused',
        'id' => 50962122,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Not Excused',
              'id' => 1,
              'color' => 'F7D1D0',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Excused (by Chiara Member directly)',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
    );
}

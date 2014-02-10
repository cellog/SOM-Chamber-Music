<?php
namespace SOM\Model;
class Changes extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "1732833/6453745";
    protected $structure = array (
      'student' => 
      array (
        'type' => 'app',
        'name' => 'student',
        'id' => 50175556,
        'config' => 
        array (
          0 => 6455277,
        ),
      ),
      50175556 => 
      array (
        'type' => 'app',
        'name' => 'student',
        'id' => 50175556,
        'config' => 
        array (
          0 => 6455277,
        ),
      ),
      50165209 => 
      array (
        'type' => 'number',
        'name' => 50165209,
        'id' => 'base-number',
        'config' => NULL,
      ),
      'base-number' => 
      array (
        'type' => 'number',
        'name' => 50165209,
        'id' => 'base-number',
        'config' => NULL,
      ),
      51227136 => 
      array (
        'type' => 'text',
        'name' => 51227136,
        'id' => 'current-class',
        'config' => NULL,
      ),
      'current-class' => 
      array (
        'type' => 'text',
        'name' => 51227136,
        'id' => 'current-class',
        'config' => NULL,
      ),
      50175697 => 
      array (
        'type' => 'calculation',
        'name' => 50175697,
        'id' => 'student-id',
        'config' => NULL,
      ),
      'student-id' => 
      array (
        'type' => 'calculation',
        'name' => 50175697,
        'id' => 'student-id',
        'config' => NULL,
      ),
      50178628 => 
      array (
        'type' => 'calculation',
        'name' => 50178628,
        'id' => 'student-id-2',
        'config' => NULL,
      ),
      'student-id-2' => 
      array (
        'type' => 'calculation',
        'name' => 50178628,
        'id' => 'student-id-2',
        'config' => NULL,
      ),
      50178629 => 
      array (
        'type' => 'calculation',
        'name' => 50178629,
        'id' => 'call-number',
        'config' => NULL,
      ),
      'call-number' => 
      array (
        'type' => 'calculation',
        'name' => 50178629,
        'id' => 'call-number',
        'config' => NULL,
      ),
      50165353 => 
      array (
        'type' => 'text',
        'name' => 50165353,
        'id' => 'course',
        'config' => NULL,
      ),
      'course' => 
      array (
        'type' => 'text',
        'name' => 50165353,
        'id' => 'course',
        'config' => NULL,
      ),
      'type' => 
      array (
        'type' => 'category',
        'name' => 'type',
        'id' => 50175558,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'MOVE to section',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'ADD to section',
              'id' => 2,
              'color' => 'E1D8ED',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'NO CHANGE (leave in section)',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'DROP old section',
              'id' => 4,
              'color' => 'F7D1D0',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50175558 => 
      array (
        'type' => 'category',
        'name' => 'type',
        'id' => 50175558,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'MOVE to section',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'ADD to section',
              'id' => 2,
              'color' => 'E1D8ED',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'NO CHANGE (leave in section)',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'DROP old section',
              'id' => 4,
              'color' => 'F7D1D0',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50175698 => 
      array (
        'type' => 'calculation',
        'name' => 50175698,
        'id' => 'to-section',
        'config' => NULL,
      ),
      'to-section' => 
      array (
        'type' => 'calculation',
        'name' => 50175698,
        'id' => 'to-section',
        'config' => NULL,
      ),
      'semester' => 
      array (
        'type' => 'category',
        'name' => 'semester',
        'id' => 50165358,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Fall 2013',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Spring 2014',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'Fall 2014',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'Spring 2015',
              'id' => 4,
              'color' => 'DCEBD8',
            ),
            4 => 
            array (
              'status' => 'active',
              'text' => 'Fall 2015',
              'id' => 5,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50165358 => 
      array (
        'type' => 'category',
        'name' => 'semester',
        'id' => 50165358,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Fall 2013',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Spring 2014',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'Fall 2014',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'Spring 2015',
              'id' => 4,
              'color' => 'DCEBD8',
            ),
            4 => 
            array (
              'status' => 'active',
              'text' => 'Fall 2015',
              'id' => 5,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      51102121 => 
      array (
        'type' => 'text',
        'name' => 51102121,
        'id' => 'student-id-3',
        'config' => NULL,
      ),
      'student-id-3' => 
      array (
        'type' => 'text',
        'name' => 51102121,
        'id' => 'student-id-3',
        'config' => NULL,
      ),
      51102122 => 
      array (
        'type' => 'text',
        'name' => 51102122,
        'id' => 'call-number-2',
        'config' => NULL,
      ),
      'call-number-2' => 
      array (
        'type' => 'text',
        'name' => 51102122,
        'id' => 'call-number-2',
        'config' => NULL,
      ),
      'status' => 
      array (
        'type' => 'category',
        'name' => 'status',
        'id' => 50175557,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Pending',
              'id' => 1,
              'color' => 'F7F0C5',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Moved',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'Added',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'Left in Section',
              'id' => 5,
              'color' => 'DCEBD8',
            ),
            4 => 
            array (
              'status' => 'active',
              'text' => 'Hold on Account',
              'id' => 4,
              'color' => 'F7D1D0',
            ),
            5 => 
            array (
              'status' => 'active',
              'text' => 'Other Problem (leave a comment)',
              'id' => 6,
              'color' => 'F7D1D0',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50175557 => 
      array (
        'type' => 'category',
        'name' => 'status',
        'id' => 50175557,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Pending',
              'id' => 1,
              'color' => 'F7F0C5',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Moved',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'Added',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'Left in Section',
              'id' => 5,
              'color' => 'DCEBD8',
            ),
            4 => 
            array (
              'status' => 'active',
              'text' => 'Hold on Account',
              'id' => 4,
              'color' => 'F7D1D0',
            ),
            5 => 
            array (
              'status' => 'active',
              'text' => 'Other Problem (leave a comment)',
              'id' => 6,
              'color' => 'F7D1D0',
            ),
          ),
          'multiple' => false,
        ),
      ),
      'group' => 
      array (
        'type' => 'app',
        'name' => 'group',
        'id' => 50175559,
        'config' => 
        array (
          0 => 6454960,
        ),
      ),
      50175559 => 
      array (
        'type' => 'app',
        'name' => 'group',
        'id' => 50175559,
        'config' => 
        array (
          0 => 6454960,
        ),
      ),
    );
}

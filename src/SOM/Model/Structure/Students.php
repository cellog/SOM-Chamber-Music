<?php
namespace SOM\Model\Structure;
class Students extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "2178086/7907975";
    protected $structure = array (
      'name' => 
      array (
        'type' => 'contact',
        'name' => 'name',
        'id' => 61298816,
        'config' => 'space_contacts',
      ),
      61298816 => 
      array (
        'type' => 'contact',
        'name' => 'name',
        'id' => 61298816,
        'config' => 'space_contacts',
      ),
      'instruments' => 
      array (
        'type' => 'app',
        'name' => 'instruments',
        'id' => 61298817,
        'config' => 
        array (
          0 => 6455730,
        ),
      ),
      61298817 => 
      array (
        'type' => 'app',
        'name' => 'instruments',
        'id' => 61298817,
        'config' => 
        array (
          0 => 6455730,
        ),
      ),
      'graduate' => 
      array (
        'type' => 'category',
        'name' => 'graduate',
        'id' => 61298818,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Undergraduate',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Graduate',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      61298818 => 
      array (
        'type' => 'category',
        'name' => 'graduate',
        'id' => 61298818,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Undergraduate',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Graduate',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      'class' => 
      array (
        'type' => 'category',
        'name' => 'class',
        'id' => 61298819,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Strings/Winds/Keyboard/Voice',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Saxophone',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'Brass',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'Guitar ensemble',
              'id' => 4,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => true,
        ),
      ),
      61298819 => 
      array (
        'type' => 'category',
        'name' => 'class',
        'id' => 61298819,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Strings/Winds/Keyboard/Voice',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Saxophone',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'Brass',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'Guitar ensemble',
              'id' => 4,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => true,
        ),
      ),
      'active' => 
      array (
        'type' => 'category',
        'name' => 'active',
        'id' => 61298820,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Active',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Not active',
              'id' => 2,
              'color' => 'F7D1D0',
            ),
          ),
          'multiple' => false,
        ),
      ),
      61298820 => 
      array (
        'type' => 'category',
        'name' => 'active',
        'id' => 61298820,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Active',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Not active',
              'id' => 2,
              'color' => 'F7D1D0',
            ),
          ),
          'multiple' => false,
        ),
      ),
      'added-to-blackboard' => 
      array (
        'type' => 'category',
        'name' => 'added-to-blackboard',
        'id' => 61298821,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'No',
              'id' => 1,
              'color' => 'F7D1D0',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Yes',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      61298821 => 
      array (
        'type' => 'category',
        'name' => 'added-to-blackboard',
        'id' => 61298821,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'No',
              'id' => 1,
              'color' => 'F7D1D0',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Yes',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      'groups' => 
      array (
        'type' => 'app',
        'name' => 'groups',
        'id' => 61298822,
        'config' => 
        array (
          0 => 7907978,
        ),
      ),
      61298822 => 
      array (
        'type' => 'app',
        'name' => 'groups',
        'id' => 61298822,
        'config' => 
        array (
          0 => 7907978,
        ),
      ),
      'ignore-2' => 
      array (
        'type' => 'number',
        'name' => 'ignore-2',
        'id' => 61298823,
        'config' => NULL,
      ),
      61298823 => 
      array (
        'type' => 'number',
        'name' => 'ignore-2',
        'id' => 61298823,
        'config' => NULL,
      ),
      'ignore-count-2' => 
      array (
        'type' => 'calculation',
        'name' => 'ignore-count-2',
        'id' => 61298824,
        'config' => NULL,
      ),
      61298824 => 
      array (
        'type' => 'calculation',
        'name' => 'ignore-count-2',
        'id' => 61298824,
        'config' => NULL,
      ),
    );
}

<?php
namespace SOM\Model;
class Students extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "1737212/6468847";
    protected $structure = array (
      'name' => 
      array (
        'type' => 'contact',
        'name' => 'name',
        'id' => 50279452,
        'config' => 'space_contacts',
      ),
      50279452 => 
      array (
        'type' => 'contact',
        'name' => 'name',
        'id' => 50279452,
        'config' => 'space_contacts',
      ),
      'instruments' => 
      array (
        'type' => 'app',
        'name' => 'instruments',
        'id' => 50279454,
        'config' => 
        array (
          0 => 6455730,
        ),
      ),
      50279454 => 
      array (
        'type' => 'app',
        'name' => 'instruments',
        'id' => 50279454,
        'config' => 
        array (
          0 => 6455730,
        ),
      ),
      50279453 => 
      array (
        'type' => 'number',
        'name' => 50279453,
        'id' => 'id-number',
        'config' => NULL,
      ),
      'id-number' => 
      array (
        'type' => 'number',
        'name' => 50279453,
        'id' => 'id-number',
        'config' => NULL,
      ),
      'graduate' => 
      array (
        'type' => 'category',
        'name' => 'graduate',
        'id' => 50279455,
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
      50279455 => 
      array (
        'type' => 'category',
        'name' => 'graduate',
        'id' => 50279455,
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
      51102294 => 
      array (
        'type' => 'text',
        'name' => 51102294,
        'id' => 'id-number-2',
        'config' => NULL,
      ),
      'id-number-2' => 
      array (
        'type' => 'text',
        'name' => 51102294,
        'id' => 'id-number-2',
        'config' => NULL,
      ),
      'class' => 
      array (
        'type' => 'category',
        'name' => 'class',
        'id' => 50279456,
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
      50279456 => 
      array (
        'type' => 'category',
        'name' => 'class',
        'id' => 50279456,
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
        'id' => 50279457,
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
      50279457 => 
      array (
        'type' => 'category',
        'name' => 'active',
        'id' => 50279457,
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
        'id' => 50912636,
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
      50912636 => 
      array (
        'type' => 'category',
        'name' => 'added-to-blackboard',
        'id' => 50912636,
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
        'id' => 50697735,
        'config' => 
        array (
          0 => 6468849,
        ),
      ),
      50697735 => 
      array (
        'type' => 'app',
        'name' => 'groups',
        'id' => 50697735,
        'config' => 
        array (
          0 => 6468849,
        ),
      ),
      50279458 => 
      array (
        'type' => 'calculation',
        'name' => 50279458,
        'id' => 'ignore-count',
        'config' => NULL,
      ),
      'ignore-count' => 
      array (
        'type' => 'calculation',
        'name' => 50279458,
        'id' => 'ignore-count',
        'config' => NULL,
      ),
      'teaching-artist-class' => 
      array (
        'type' => 'category',
        'name' => 'teaching-artist-class',
        'id' => 50650088,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'No',
              'id' => 1,
              'color' => 'DCEBD8',
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
      50650088 => 
      array (
        'type' => 'category',
        'name' => 'teaching-artist-class',
        'id' => 50650088,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'No',
              'id' => 1,
              'color' => 'DCEBD8',
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
      51625150 => 
      array (
        'type' => 'number',
        'name' => 51625150,
        'id' => 'ignore-2',
        'config' => NULL,
      ),
      'ignore-2' => 
      array (
        'type' => 'number',
        'name' => 51625150,
        'id' => 'ignore-2',
        'config' => NULL,
      ),
      51625353 => 
      array (
        'type' => 'calculation',
        'name' => 51625353,
        'id' => 'ignore-count-2',
        'config' => NULL,
      ),
      'ignore-count-2' => 
      array (
        'type' => 'calculation',
        'name' => 51625353,
        'id' => 'ignore-count-2',
        'config' => NULL,
      ),
    );
}

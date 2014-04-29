<?php
namespace SOM\Model\Structure;
class ChamberGroups extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "2178086/7907978";
    protected $structure = array (
      'group-description' => 
      array (
        'type' => 'text',
        'name' => 'group-description',
        'id' => 61298846,
        'config' => NULL,
      ),
      61298846 => 
      array (
        'type' => 'text',
        'name' => 'group-description',
        'id' => 61298846,
        'config' => NULL,
      ),
      'members' => 
      array (
        'type' => 'app',
        'name' => 'members',
        'id' => 61298847,
        'config' => 
        array (
          0 => 7907975,
        ),
      ),
      61298847 => 
      array (
        'type' => 'app',
        'name' => 'members',
        'id' => 61298847,
        'config' => 
        array (
          0 => 7907975,
        ),
      ),
      'coach' => 
      array (
        'type' => 'app',
        'name' => 'coach',
        'id' => 61298848,
        'config' => 
        array (
          0 => 6455124,
        ),
      ),
      61298848 => 
      array (
        'type' => 'app',
        'name' => 'coach',
        'id' => 61298848,
        'config' => 
        array (
          0 => 6455124,
        ),
      ),
      'type-2' => 
      array (
        'type' => 'app',
        'name' => 'type-2',
        'id' => 61298849,
        'config' => 
        array (
          0 => 6500675,
        ),
      ),
      61298849 => 
      array (
        'type' => 'app',
        'name' => 'type-2',
        'id' => 61298849,
        'config' => 
        array (
          0 => 6500675,
        ),
      ),
      'name-if-any' => 
      array (
        'type' => 'text',
        'name' => 'name-if-any',
        'id' => 61298850,
        'config' => NULL,
      ),
      61298850 => 
      array (
        'type' => 'text',
        'name' => 'name-if-any',
        'id' => 61298850,
        'config' => NULL,
      ),
      'class' => 
      array (
        'type' => 'category',
        'name' => 'class',
        'id' => 61298851,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Strings/Wind/Keyboard/Voice',
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
              'text' => 'Guitar',
              'id' => 4,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      61298851 => 
      array (
        'type' => 'category',
        'name' => 'class',
        'id' => 61298851,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Strings/Wind/Keyboard/Voice',
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
              'text' => 'Guitar',
              'id' => 4,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      'member-count' => 
      array (
        'type' => 'calculation',
        'name' => 'member-count',
        'id' => 61298852,
        'config' => NULL,
      ),
      61298852 => 
      array (
        'type' => 'calculation',
        'name' => 'member-count',
        'id' => 61298852,
        'config' => NULL,
      ),
      'teaching-artist-class' => 
      array (
        'type' => 'category',
        'name' => 'teaching-artist-class',
        'id' => 61298855,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Masterclass',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Teaching Artist Class',
              'id' => 2,
              'color' => 'E1D8ED',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => '(Duplicate group)',
              'id' => 3,
              'color' => 'F7F0C5',
            ),
          ),
          'multiple' => false,
        ),
      ),
      61298855 => 
      array (
        'type' => 'category',
        'name' => 'teaching-artist-class',
        'id' => 61298855,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Masterclass',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Teaching Artist Class',
              'id' => 2,
              'color' => 'E1D8ED',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => '(Duplicate group)',
              'id' => 3,
              'color' => 'F7F0C5',
            ),
          ),
          'multiple' => false,
        ),
      ),
      'exempt-from-outreach' => 
      array (
        'type' => 'category',
        'name' => 'exempt-from-outreach',
        'id' => 61298856,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Outreach required',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Outreach NOT required',
              'id' => 2,
              'color' => 'F7D1D0',
            ),
          ),
          'multiple' => false,
        ),
      ),
      61298856 => 
      array (
        'type' => 'category',
        'name' => 'exempt-from-outreach',
        'id' => 61298856,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Outreach required',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Outreach NOT required',
              'id' => 2,
              'color' => 'F7D1D0',
            ),
          ),
          'multiple' => false,
        ),
      ),
    );
}

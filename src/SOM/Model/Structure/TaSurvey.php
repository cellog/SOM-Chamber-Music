<?php
namespace SOM\Model\Structure;
class TaSurvey extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "2178086/7907981";
    protected $structure = array (
      'choose-your-group' => 
      array (
        'type' => 'app',
        'name' => 'choose-your-group',
        'id' => 61298872,
        'config' => 
        array (
          0 => 7907978,
        ),
      ),
      61298872 => 
      array (
        'type' => 'app',
        'name' => 'choose-your-group',
        'id' => 61298872,
        'config' => 
        array (
          0 => 7907978,
        ),
      ),
      'is-your-group-doing-the-teaching-artist-class-or-the-ma' => 
      array (
        'type' => 'category',
        'name' => 'is-your-group-doing-the-teaching-artist-class-or-the-ma',
        'id' => 61298873,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Teaching Artist track',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Masterclass track',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      61298873 => 
      array (
        'type' => 'category',
        'name' => 'is-your-group-doing-the-teaching-artist-class-or-the-ma',
        'id' => 61298873,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Teaching Artist track',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Masterclass track',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
    );
}

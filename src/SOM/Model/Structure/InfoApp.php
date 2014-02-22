<?php
namespace SOM\Model\Structure;
class InfoApp extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "1737212/6500683";
    protected $structure = array (
      'choose-your-name' => 
      array (
        'type' => 'app',
        'name' => 'choose-your-name',
        'id' => 50518429,
        'config' => 
        array (
          0 => 6468847,
        ),
      ),
      50518429 => 
      array (
        'type' => 'app',
        'name' => 'choose-your-name',
        'id' => 50518429,
        'config' => 
        array (
          0 => 6468847,
        ),
      ),
      'status' => 
      array (
        'type' => 'category',
        'name' => 'status',
        'id' => 50552797,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Pending',
              'id' => 1,
              'color' => 'F7D1D0',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Partial',
              'id' => 2,
              'color' => 'F7F0C5',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'Handled',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50552797 => 
      array (
        'type' => 'category',
        'name' => 'status',
        'id' => 50552797,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Pending',
              'id' => 1,
              'color' => 'F7D1D0',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Partial',
              'id' => 2,
              'color' => 'F7F0C5',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'Handled',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      'if-your-name-is-not-found-please-enter-your-contact-inf' => 
      array (
        'type' => 'question',
        'name' => 'if-your-name-is-not-found-please-enter-your-contact-inf',
        'id' => 50518430,
        'config' => 
        array (
          'options' => 
          array (
          ),
          'multiple' => false,
        ),
      ),
      50518430 => 
      array (
        'type' => 'question',
        'name' => 'if-your-name-is-not-found-please-enter-your-contact-inf',
        'id' => 50518430,
        'config' => 
        array (
          'options' => 
          array (
          ),
          'multiple' => false,
        ),
      ),
      'contact-information' => 
      array (
        'type' => 'contact',
        'name' => 'contact-information',
        'id' => 50518431,
        'config' => 'space_contacts',
      ),
      50518431 => 
      array (
        'type' => 'contact',
        'name' => 'contact-information',
        'id' => 50518431,
        'config' => 'space_contacts',
      ),
      'instrument' => 
      array (
        'type' => 'app',
        'name' => 'instrument',
        'id' => 50518432,
        'config' => 
        array (
          0 => 6455730,
        ),
      ),
      50518432 => 
      array (
        'type' => 'app',
        'name' => 'instrument',
        'id' => 50518432,
        'config' => 
        array (
          0 => 6455730,
        ),
      ),
      'have-you-registered' => 
      array (
        'type' => 'question',
        'name' => 'have-you-registered',
        'id' => 50518433,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Yes, because I am awesome',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'No, because I have not done it yet',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'No, because I have a hold on my account',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'No, because I need help',
              'id' => 4,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50518433 => 
      array (
        'type' => 'question',
        'name' => 'have-you-registered',
        'id' => 50518433,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Yes, because I am awesome',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'No, because I have not done it yet',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'No, because I have a hold on my account',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'No, because I need help',
              'id' => 4,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      'if-you-have-not-registered-which-course-will-you-regist' => 
      array (
        'type' => 'question',
        'name' => 'if-you-have-not-registered-which-course-will-you-regist',
        'id' => 50518434,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Undergraduate, 0 credits (MUCO 52 code 7402)',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Undergraduate, 1 credit (MUCO 352, 7454)',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'Graduate, 0 credits (MUEN 52, 7602)',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'Graduate, 1 credit (MUEN 852, code 7653)',
              'id' => 4,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50518434 => 
      array (
        'type' => 'question',
        'name' => 'if-you-have-not-registered-which-course-will-you-regist',
        'id' => 50518434,
        'config' => 
        array (
          'options' => 
          array (
            0 => 
            array (
              'status' => 'active',
              'text' => 'Undergraduate, 0 credits (MUCO 52 code 7402)',
              'id' => 1,
              'color' => 'DCEBD8',
            ),
            1 => 
            array (
              'status' => 'active',
              'text' => 'Undergraduate, 1 credit (MUCO 352, 7454)',
              'id' => 2,
              'color' => 'DCEBD8',
            ),
            2 => 
            array (
              'status' => 'active',
              'text' => 'Graduate, 0 credits (MUEN 52, 7602)',
              'id' => 3,
              'color' => 'DCEBD8',
            ),
            3 => 
            array (
              'status' => 'active',
              'text' => 'Graduate, 1 credit (MUEN 852, code 7653)',
              'id' => 4,
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50518435 => 
      array (
        'type' => 'text',
        'name' => 50518435,
        'id' => 'do-you-have-a-preformed-group-please-enter-the-names-of',
        'config' => NULL,
      ),
      'do-you-have-a-preformed-group-please-enter-the-names-of' => 
      array (
        'type' => 'text',
        'name' => 50518435,
        'id' => 'do-you-have-a-preformed-group-please-enter-the-names-of',
        'config' => NULL,
      ),
      'pre-formed-group-type' => 
      array (
        'type' => 'app',
        'name' => 'pre-formed-group-type',
        'id' => 50518436,
        'config' => 
        array (
          0 => 6500675,
        ),
      ),
      50518436 => 
      array (
        'type' => 'app',
        'name' => 'pre-formed-group-type',
        'id' => 50518436,
        'config' => 
        array (
          0 => 6500675,
        ),
      ),
      50518437 => 
      array (
        'type' => 'text',
        'name' => 50518437,
        'id' => 'if-you-do-not-see-your-group-type-please-enter-its-inst',
        'config' => NULL,
      ),
      'if-you-do-not-see-your-group-type-please-enter-its-inst' => 
      array (
        'type' => 'text',
        'name' => 50518437,
        'id' => 'if-you-do-not-see-your-group-type-please-enter-its-inst',
        'config' => NULL,
      ),
      'coach-request-optional' => 
      array (
        'type' => 'app',
        'name' => 'coach-request-optional',
        'id' => 50518438,
        'config' => 
        array (
          0 => 6455124,
        ),
      ),
      50518438 => 
      array (
        'type' => 'app',
        'name' => 'coach-request-optional',
        'id' => 50518438,
        'config' => 
        array (
          0 => 6455124,
        ),
      ),
      'if-you-are-stringswindskeyboardvoiceguitar-would-you-li' => 
      array (
        'type' => 'question',
        'name' => 'if-you-are-stringswindskeyboardvoiceguitar-would-you-li',
        'id' => 50650186,
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
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50650186 => 
      array (
        'type' => 'question',
        'name' => 'if-you-are-stringswindskeyboardvoiceguitar-would-you-li',
        'id' => 50650186,
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
              'color' => 'DCEBD8',
            ),
          ),
          'multiple' => false,
        ),
      ),
      50518439 => 
      array (
        'type' => 'text',
        'name' => 50518439,
        'id' => 'anything-else-we-should-know',
        'config' => NULL,
      ),
      'anything-else-we-should-know' => 
      array (
        'type' => 'text',
        'name' => 50518439,
        'id' => 'anything-else-we-should-know',
        'config' => NULL,
      ),
    );
}

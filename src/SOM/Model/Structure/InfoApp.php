<?php
namespace SOM\Model\Structure;
class InfoApp extends \Chiara\PodioApplicationStructure
{
    const APPNAME = "2178086/7907977";
    protected $structure = array (
      'choose-your-name' => 
      array (
        'type' => 'app',
        'name' => 'choose-your-name',
        'id' => 61298833,
        'config' => 
        array (
          0 => 7907975,
        ),
      ),
      61298833 => 
      array (
        'type' => 'app',
        'name' => 'choose-your-name',
        'id' => 61298833,
        'config' => 
        array (
          0 => 7907975,
        ),
      ),
      'status' => 
      array (
        'type' => 'category',
        'name' => 'status',
        'id' => 61298834,
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
      61298834 => 
      array (
        'type' => 'category',
        'name' => 'status',
        'id' => 61298834,
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
        'type' => 'category',
        'name' => 'if-your-name-is-not-found-please-enter-your-contact-inf',
        'id' => 61298835,
        'config' => 
        array (
          'options' => 
          array (
          ),
          'multiple' => false,
        ),
      ),
      61298835 => 
      array (
        'type' => 'category',
        'name' => 'if-your-name-is-not-found-please-enter-your-contact-inf',
        'id' => 61298835,
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
        'id' => 61298836,
        'config' => 'space_contacts',
      ),
      61298836 => 
      array (
        'type' => 'contact',
        'name' => 'contact-information',
        'id' => 61298836,
        'config' => 'space_contacts',
      ),
      'instrument' => 
      array (
        'type' => 'app',
        'name' => 'instrument',
        'id' => 61298837,
        'config' => 
        array (
          0 => 6455730,
        ),
      ),
      61298837 => 
      array (
        'type' => 'app',
        'name' => 'instrument',
        'id' => 61298837,
        'config' => 
        array (
          0 => 6455730,
        ),
      ),
      'have-you-registered' => 
      array (
        'type' => 'category',
        'name' => 'have-you-registered',
        'id' => 61298838,
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
      61298838 => 
      array (
        'type' => 'category',
        'name' => 'have-you-registered',
        'id' => 61298838,
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
        'type' => 'category',
        'name' => 'if-you-have-not-registered-which-course-will-you-regist',
        'id' => 61298839,
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
      61298839 => 
      array (
        'type' => 'category',
        'name' => 'if-you-have-not-registered-which-course-will-you-regist',
        'id' => 61298839,
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
      'do-you-have-a-preformed-group-please-enter-the-names-of' => 
      array (
        'type' => 'text',
        'name' => 'do-you-have-a-preformed-group-please-enter-the-names-of',
        'id' => 61298840,
        'config' => NULL,
      ),
      61298840 => 
      array (
        'type' => 'text',
        'name' => 'do-you-have-a-preformed-group-please-enter-the-names-of',
        'id' => 61298840,
        'config' => NULL,
      ),
      'pre-formed-group-type' => 
      array (
        'type' => 'app',
        'name' => 'pre-formed-group-type',
        'id' => 61298841,
        'config' => 
        array (
          0 => 6500675,
        ),
      ),
      61298841 => 
      array (
        'type' => 'app',
        'name' => 'pre-formed-group-type',
        'id' => 61298841,
        'config' => 
        array (
          0 => 6500675,
        ),
      ),
      'if-you-do-not-see-your-group-type-please-enter-its-inst' => 
      array (
        'type' => 'text',
        'name' => 'if-you-do-not-see-your-group-type-please-enter-its-inst',
        'id' => 61298842,
        'config' => NULL,
      ),
      61298842 => 
      array (
        'type' => 'text',
        'name' => 'if-you-do-not-see-your-group-type-please-enter-its-inst',
        'id' => 61298842,
        'config' => NULL,
      ),
      'coach-request-optional' => 
      array (
        'type' => 'app',
        'name' => 'coach-request-optional',
        'id' => 61298843,
        'config' => 
        array (
          0 => 6455124,
        ),
      ),
      61298843 => 
      array (
        'type' => 'app',
        'name' => 'coach-request-optional',
        'id' => 61298843,
        'config' => 
        array (
          0 => 6455124,
        ),
      ),
      'if-you-are-stringswindskeyboardvoiceguitar-would-you-li' => 
      array (
        'type' => 'category',
        'name' => 'if-you-are-stringswindskeyboardvoiceguitar-would-you-li',
        'id' => 61298844,
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
      61298844 => 
      array (
        'type' => 'category',
        'name' => 'if-you-are-stringswindskeyboardvoiceguitar-would-you-li',
        'id' => 61298844,
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
      'anything-else-we-should-know' => 
      array (
        'type' => 'text',
        'name' => 'anything-else-we-should-know',
        'id' => 61298845,
        'config' => NULL,
      ),
      61298845 => 
      array (
        'type' => 'text',
        'name' => 'anything-else-we-should-know',
        'id' => 61298845,
        'config' => NULL,
      ),
    );
}

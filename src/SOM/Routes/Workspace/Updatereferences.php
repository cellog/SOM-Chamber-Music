<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Hook, PodioAppField, PodioApp;
class Updatereferences extends Route
{
    const ID = '6553105';
    const FIELD = '50911244';
    protected $studentsid;
    
    function __construct(array $params = array())
    {
        if (count($params) != 1) {
            throw new \Exception('invalid call format');
        }
        $this->studentsid = $params[0];
    }

    function getConfig($field)
    {
        $ret = array(
            'label' => $field->label,
            'description' => $field->config['description'],
            'delta' => 0,
            'settings' => array(
                'referenceable_types' => array($this->studentsid)
            ),
            'required' => true
        );
        if (!$ret['description']) unset ($ret['description']);
        echo '<pre>',var_dump($field);
        return $ret;
    }

    function activate(SOM $som)
    {
        $field = PodioAppField::get(self::ID, self::FIELD);
        // verify the app id is good
        $app = PodioApp::get($this->studentsid);
        if ($app->url_label != 'students') {
            echo '<strong>ERROR</strong>: id passed in was not for a <strong>students</strong> app, but was for <strong>',
                 $app->config['name'], '</strong>';
            exit;
        }
        PodioAppField::update(self::ID, self::FIELD, $this->getConfig($field));
        echo 'Updated references in the Chamber Music Admin workspace to point to the new workspace';
    }
}
<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Hook, PodioAppField, PodioApp;
class Updatereferences extends Route
{
    const ID = 6618817; // student IDs
    const FIELD = 51410137; // student field
    const ID2 = 6455277; // Registration
    const FIELD2 = 50176892; // chamber group field
    protected $studentsid;
    protected $groupsid;
    
    function __construct(array $params = array())
    {
        if (count($params) != 2) {
            throw new \Exception('invalid call format');
        }
        $this->studentsid = (int) $params[0];
        // verify the app id is good
        $app = PodioApp::get($this->studentsid);
        if ($app->url_label != 'students') {
            echo '<strong>ERROR</strong>: id passed in was not for a <strong>students</strong> app, but was for <strong>',
                 $app->config['name'], '</strong>';
            exit;
        }
        foreach ($app->fields as $field) {
            if ($field->external_id == 'groups') {
                $this->groupsid = $field->config['settings']['referenceable_types'][0];
                $app = PodioApp::get($this->groupsid);
                if ($app->url_label != 'groups') {
                    echo '<strong>ERROR</strong>: id grabbed from students app was not for a <strong>groups</strong> app, but was for <strong>',
                         $app->config['name'], '</strong>';
                    exit;
                }
            }
        }
    }

    function getConfig($field)
    {
        $ret = array(
            'label' => $field->config['label'],
            'description' => $field->config['description'],
            'delta' => 0,
            'settings' => array(
                'referenceable_types' => array($this->studentsid)
            ),
            'required' => true
        );
        if (!$ret['description']) unset ($ret['description']);
        return $ret;
    }

    // TODO: fill in the app references for setup workspace
    function updateReferences(SOM $som)
    {
        $field = PodioAppField::get(self::ID, self::FIELD);
        $field2 = PodioAppField::get(self::ID2, self::FIELD2);
        $field3 = PodioAppField::get(self::ID3, self::FIELD3);
        PodioAppField::update(self::ID, self::FIELD, $this->getConfig($field));
        PodioAppField::update(self::ID2, self::FIELD2, $this->getConfig($field2));
        PodioAppField::update(self::ID3, self::FIELD3, $this->getConfig($field3));
        echo 'Updated references in the Chamber Music Admin workspace to point to the new workspace';
    }
}
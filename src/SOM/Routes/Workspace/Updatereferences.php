<?php
namespace SOM\Routes\Workspace;
use SOM\Route, SOM, SOM\Hook, PodioAppField;
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

    function activate(SOM $som)
    {
        $field = PodioAppField::get(self::ID, self::FIELD);
        echo '<pre>';
        var_dump($field);
        $field->config['settings']['referenceable_types'];
    }
}
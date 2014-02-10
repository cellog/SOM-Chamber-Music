<?php
include 'autoload.php';
$tokenmanager = new Chiara\AuthManager\File(__DIR__ . '/podiotokens.json', __DIR__ . '/somchamber.json', true);
Chiara\AuthManager::setAuthMode(Chiara\AuthManager::APP);
Chiara\AuthManager::setTokenManager($tokenmanager);

foreach (array(
    array(6618817,'StudentIDs'),
    array(6455277,'Registration'),
    array(6484201,'NotRegistered'),
    array(6484199,'Registered'),
    array(6454935,'Numbers'),
    array(6453745,'Changes'),
    array(6468847,'Students'),
    array(6468849,'Chamber'),
) as $appinfo) {
    list ($appid, $class) = $appinfo;
    $app = new Chiara\PodioApp($appid);
    $structure = new Chiara\PodioApplicationStructure;
    $structure->structureFromApp($app);
    $structure->generateStructureClass($app->space_id, $appid, $class, 'SOM\Model', __DIR__ . '/SOM/Model/' . $class . '.php');
    $item = new Chiara\PodioItem(array('app_id' => $appid));
    $item->generateClass($class, $appid, 'SOM\Model\\' . $class, 'SOM\Model\Item', array(), __DIR__ . '/SOM/Model/Item/' . $class .
                         '.php');
}
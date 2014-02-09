<?php
include 'autoload.php';
$tokenmanager = new Chiara\AuthManager\File(__DIR__ . '/podiotokens.json', __DIR__ . '/somchamber.json', true);
Chiara\AuthManager::setAuthMode(Chiara\AuthManager::APP);
Chiara\AuthManager::setTokenManager($tokenmanager);


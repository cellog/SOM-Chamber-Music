<?php
include __DIR__ . '/src/autoload.php';
try {
  Podio::$debug = true;
  Podio::$logger = new PodioLogger();
  
  $hook = new SOM\Hook();

  $hook->perform($_POST['type'], $_POST);

}
catch (PodioError $e) {
  Podio::$logger->log($e->body['error_description']);
  // Something went wrong. Examine $e->body['error_description'] for a description of the error.
}


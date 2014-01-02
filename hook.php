<?php
include __DIR__ . '/src/autoload.php';
try {
  Podio::$debug = true;
  
  $hook = new SOM\Hook();

  $hook->perform($_POST['type'], $_POST);

}
catch (PodioError $e) {
  // Something went wrong. Examine $e->body['error_description'] for a description of the error.
}


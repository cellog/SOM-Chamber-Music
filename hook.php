<?php
include __DIR__ . '/src/autoload.php';
try {
  
  $hook = new SOM\Hook();

  $hook->perform($_GET['type'], $_GET);

}
catch (PodioError $e) {
  // Something went wrong. Examine $e->body['error_description'] for a description of the error.
}


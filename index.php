<?php ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
include __DIR__ . '/src/autoload.php'; ?>
    <?php echo "1";
$som = new SOM; ?>
<html>
    
</html>
<body>
    <?php $som->route() ?>
</body>
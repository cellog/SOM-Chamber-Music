<?php error_reporting(E_ALL);
echo "0";
include __DIR__ . '/src/autoload.php'; ?>
    <?php echo "1";
$som = new SOM; ?>
<html>
    
</html>
<body>
    <?php $som->route() ?>
</body>
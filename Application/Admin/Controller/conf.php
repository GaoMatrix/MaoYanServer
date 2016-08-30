<?php
require __DIR__ . '/../Library/autoload.php';

use JPush\Client as JPush;

$app_key = '82dd9256c16c85d35ee0548c';
$master_secret = '72dd14443b1c8f1f78179adf';
$registration_id = '190e35f7e04db912a22';
$client = new JPush($app_key, $master_secret);

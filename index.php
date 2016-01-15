<?php

require_once 'autoload.php'; //load app classes
require_once 'lib/limonade.php';

dispatch('/css/:css', 'AssetController::css');
dispatch('/js/:js', 'AssetController::js');

//REST API
dispatch_get('/test', 'TestController::get');
dispatch_post('/test', 'TestController::post');
dispatch_put('/test', 'TestController::put');
dispatch_delete('/test', 'TestController::deletee');

//pages
dispatch('/', 'MainController::index'); 

run();
?>
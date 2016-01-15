<?php

require_once 'autoload.php'; //load app classes
require_once 'lib/limonade.php';

dispatch('/css/:css', 'AssetController::css');
dispatch('/js/:js', 'AssetController::js');

//REST API

dispatch_get('/api/users', 'UserController::index');
dispatch_get('/api/users/:id', 'UserController::get');
dispatch_post('/api/users', 'UserController::post');
dispatch_put('/api/users/:id', 'UserController::put');
dispatch_delete('/api/users/:id', 'UserController::remove');

dispatch_get('/api/users/search/:name', 'UserController::search');

//pages
dispatch('/', 'MainController::index'); 

run();
?>

<?php
spl_autoload_register(function($class_name){
    require "../app/models/".$class_name.".php";
});


require_once __DIR__."/../../vendor/autoload.php";
require"../app/core/functions.php";
require"../app/core/config.php";
require"../app/core/database.php";
require"../app/core/model.php";
require"../app/core/controller.php";
require"../app/core/app.php";

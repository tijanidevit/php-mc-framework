<?php
    //LOAD CONFIGS
    require_once 'config/config.php';
    require_once 'config/dbConfig.php';
    
    //AUTOLOAD LIBRARIES
    spl_autoload_register(function ($className){
        require_once 'libraries/'.$className.'.php';
    });
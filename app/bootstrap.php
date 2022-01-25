<?php
    //LOAD CONFIGS
    require_once 'config/config.php';
    
    //AUTOLOAD LIBRARIES
    spl_autoload_register(function ($className){
        require_once 'libraries/'.$className.'.php';
    });
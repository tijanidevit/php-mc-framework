<?php  
    /*
        Base Controller
        Loads models and views
    */

    class Controller{
        //Load Model
        public function model($model)
        {
            require_once '../app/models/'.$model. '.php';

            return new $model;
        }

        function response($data) {
            echo json_encode($data);
        }
    }
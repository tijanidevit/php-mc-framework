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

        public function form($key)
        {
            if (isset($_POST[$key])) {
                return trim(stripslashes(htmlspecialchars($_POST[$key])));
            }
            else {
                throw new Exception("Post key ". $key . " not defined", 1);
            }
        }

        public function require($fields)
        {
            foreach ($fields as $key) {
                if (!isset($_POST[$key])) {
                    throw new Exception( $key . " is required and cannot be null", 1);
                }
            }
        }

        function response($data) {
            echo json_encode($data, JSON_PRETTY_PRINT);
        }
    }
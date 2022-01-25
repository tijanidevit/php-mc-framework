<?php
    /*
    App Core Class
    Creates URL and loads core controller
    URL format -/controller/method/params
    */

    class Core{
        protected $currentController = 'Pages';
        protected $currentControllerText = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct()
        {
            $url = $this->getUrl();

            //get controller
            if (! is_null($url)) {
                if (file_exists('../app/controllers/'.ucwords($url[0].'.php'))) {
                    $this->currentController = ucwords($url[0]);
                    $this->currentControllerText = ucwords($url[0]);
                    //unset the controller's index
                    unset($url[0]);
                }
                else{
                    die('Controller '.ucwords(strtoupper($url[0])).' Not found');
                }

                //Require the controller afterwards
                require_once '../app/controllers/'.$this->currentController.'.php'; 
                $this->currentController = new $this->currentController;

                //get method
                if (isset($url[1])) {
                    if (method_exists($this->currentController, $url[1])) {
                        $this->currentMethod = ucwords($url[1]);
                        //unset the method's index
                        unset($url[1]);
                    }
                    else{
                        die('Method '.ucwords(strtoupper($url[1])).' Not found in '. $this->currentControllerText .' Controller');
                    }
                }

                $this->params = $url ? array_values($url) : [];

                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);


            }
            else{
                require_once '../app/controllers/'.$this->currentController.'.php'; 
                $this->currentController = new $this->currentController;

                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            }         
           
        }

        public function getUrl()
        {
            if (isset($_GET['url'])) {
                $url = $_GET['url'];
                $url = $this->_filterUrl(($url));
                $url = explode('/',$url);
                return $url;
            }
        }


        private function _filterUrl($url){
            $url = rtrim($url, '/');
            return filter_var($url, FILTER_SANITIZE_URL);
        }
    }
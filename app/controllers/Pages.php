<?php
    class Pages extends Controller{
        // public function __construct()
        // {
        //     $this->index();
        // }
        public function index()
        {
            $this->view('index');
        }
        public function about($user)
        {
            echo 'Xpat Giidem '. $user;
        }
    }
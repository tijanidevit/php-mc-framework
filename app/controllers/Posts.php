<?php
    class Posts extends Controller{
        
        public function __construct()
        {
            $this->postModel = $this->model('Post');
        }

        public function index()
        {
            $data = [
                'title' => 'Xpat Giidem',
                'content' => 'Lorem shudda been ipsum tho!'
            ];
            $this->view('posts/index', $data);
        }
        public function about($user)
        {
            $this->view('posts/about', 'Is this a post? '. $user);
        }
    }
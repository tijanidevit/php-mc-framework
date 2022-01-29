<?php
    class Posts extends Controller{
        
        public function __construct()
        {
            $this->postModel = $this->model('Post');
        }

        public function index()
        {
            $data = $this->postModel->getPosts();
            return $this->response([
                'success' => true,
                'posts' => $data,
            ]);
        }
        public function about($user)
        {
            return $this->response($user);
        }
    }
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
        

        public function single($id)
        {
            $data = $this->postModel->getPost($id);
            return $this->response([
                'success' => true,
                'posts' => $data,
            ]);
        }
        

        public function updatePost($id)
        {
            $post = $this->postModel->getPost($id);
            if (! empty($post)) {

                $data = [
                    'title' => 'Xpat Giidem', 
                    'content' => 'A Taste Of Me The EP drops on March 9'
                ];
                $response = $this->postModel->updatePost($data,$id);
                return $this->response([
                    'success' => true,
                    'data' => $response,
                ]);
            }
            return $this->response([
                'success' => true,
                'message' => 'Post not found',
            ]);
        }

    }
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
        
        public function insertPost()
        {   
            try {
                
                $this->require(['title','content']);

                $title = $this->form('title');
                $content = $this->form('content');
                $data = [
                    'title' => $title, 
                    'content' => $content
                ];
                $response = $this->postModel->insertPost($data);
                return $this->response([
                    'success' => true,
                    'data' => $response,
                ]);
            } catch (Exception $e) {
                return $this->response([
                    'success' => false,
                    'message' => $e->getMessage(),
                ]);
            }
        }

    }
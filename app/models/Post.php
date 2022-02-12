<?php
    
    Class Post{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getPosts()
        {
            $this->db->select('*');
            $this->db->from('posts');
            $this->db->orderBy('id','DESC');
            return $this->db->fetchAll();
            // $this->db->query('SELECT * FROM posts');
            // return $this->db->fetchAll();
        }

        public function getPost($id)
        {
            $this->db->select('*');
            $this->db->from('posts');
            $this->db->where(['id' => $id]);
            return $this->db->fetchAll();

            
            // $this->db->query('SELECT * FROM posts');
            // return $this->db->fetchAll();
        }

        public function updatePost($data,$id)
        {
            $this->db->update($data, 'posts');
            $this->db->where(['id' => $id]);
            return $this->db->run();
        }
    }
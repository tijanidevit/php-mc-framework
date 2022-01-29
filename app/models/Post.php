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
            $this->db->where(['title' => "Hello There!!!"]);
            return $this->db->fetchAll();

            
            // $this->db->query('SELECT * FROM posts');
            // return $this->db->fetchAll();
        }
    }
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
            $this->db->where(['id' => 2]);
            $this->db->orWhere(['title' => 'Hello There!!!']);
            $this->db->orderBy('id','DESC');
            $this->db->limit(2);
            return $this->db->fetchAll();

            
            // $this->db->query('SELECT * FROM posts');
            // return $this->db->fetchAll();
        }
    }
<?php
    class Post {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get Posts
        public function getPosts() {
            $this->db->query('SELECT * FROM posts');

            return $this->db->resultSet();
        } 
    }
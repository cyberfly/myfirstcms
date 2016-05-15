<?php

class Article_model extends MY_Model {

        public function __construct()
        {
                parent::__construct();
        }

        /*
        database query to get records from table articles
        */

        public function latest_articles()
        {
                $query = $this->db->get('articles', 10);
                return $query->result();
        }

}

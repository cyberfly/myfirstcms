<?php

class Post_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /*
	Use this function in Controller to get information from other joined table
	Eg 1: $records = $this->post_model->post_info()->get_all();
	Eg 2: $records = $this->post_model->post_info()->get_by('posts.id',$post_id);
    */

    public function post_info()
    {
    	$this->db->join('categories', 'categories.id = posts.category_id');
    	return $this; 
    }

}

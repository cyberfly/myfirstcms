<?php 

class Post_model extends MY_Model
{
	public $_table = 'posts';
 	public $primary_key = 'id';


	public function __construct()
	{
		parent::__construct();
	}

	public function post_info()
	{
		// select semua posts fields, category_name dan username

		$this->db->select('posts.*,categories.category_name,users.username');
		
		//join dengan table categories untuk dapatkan category name

		$this->db->join('categories','categories.id = posts.category_id','left');
		
		//join dengan table users untuk dapatkan username

		$this->db->join('users','users.id = posts.user_id','left');

		$this->db->order_by('id', 'DESC');
		
		return $this;
	}
}





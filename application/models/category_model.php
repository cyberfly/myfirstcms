<?php 

class Category_model extends MY_Model
{
	public $_table = 'categories';
 	public $primary_key = 'id';

	public function __construct()
	{
		parent::__construct();
	}
}





<?php 

class Students_model extends MY_Model
{
	public $_table = 'students_info';
 	public $primary_key = 'id';

	public function __construct()
	{
		parent::__construct();
	}
}





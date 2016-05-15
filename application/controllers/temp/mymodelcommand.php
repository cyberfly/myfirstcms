<?php 

$row = $this->post_model->get(2);      
//SELECT * FROM (`posts`) WHERE `id` = 2

$row = $this->post_model->get_by('title', 'CodeIgniter Training');
//SELECT * FROM (`posts`) WHERE `title` = 'CodeIgniter Training'
// NOTE: if more than 1, returns first

$result = $this->post_model->get_many(array(1,3,4));
//SELECT * FROM (`posts`) WHERE `id` IN (1, 3, 4)  

$result = $this->post_model->get_many_by('title', 'CodeIgniter Training');
//SELECT * FROM (`posts`) WHERE `title` = 'CodeIgniter Training'

$result = $this->post_model->get_all();
//SELECT * FROM (`posts`)

$count = $this->post_model->count_by('title', 'CodeIgniter Training');
//SELECT COUNT(*) AS `numrows` FROM (`posts`) WHERE `title` = 'CodeIgniter Training'

$count = $this->post_model->count_all();
//SELECT COUNT(*) AS `numrows` FROM `posts`

$insert_id = $this->post_model->insert(array('content'=>'Day 2 of training!', 'title'=>'jQuery training'), FALSE);
//INSERT INTO `posts` (`content`, `title`) VALUES ('Day 2 of training!', 'jQuery training')


$insert_array = array(
        array('content'=>'Hello', 'title'=>'I must be going'),
        array('content'=>"When she's gone", 'title'=>"Ain't no sunshine" ),
    );

$insert_ids = $this->post_model->insert_many($insert_array, FALSE);    
//INSERT INTO `posts` (`content`, `title`) VALUES ('Content 1', 'Content 2')


$update_id = $this->post_model->update(4, array('content'=>'Last day of training', 'title'=>'AJAX training'));
//UPDATE `posts` SET `content` = 'Last day of training', `title` = 'AJAX training' WHERE `id` = 4

$update_id = $this->post_model->update_by(array('title'=>'jQuery training'), array('content'=>'This looks cool'));
//UPDATE `posts` SET `content` = 'This looks cool' WHERE `title` = 'jQuery training' 

$update_id = $this->post_model->update_many(array(3,4,5), array('content'=>"Success update yes!"));
//UPDATE `posts` SET `content` = 'Success update yes!' WHERE `id` IN (3, 4, 5)   

$update_id = $this->post_model->update_all( array('title'=>"Bootstrap Training"));
//UPDATE `posts` SET `title` = 'Bootstrap Training'  

$delete_id = $this->post_model->delete( 7);
//DELETE FROM `posts` WHERE `id` = 7 

$delete_id = $this->post_model->delete_by( array('content'=>'Hello'));
//DELETE FROM `posts` WHERE `content` = 'Hello' 

$delete_id = $this->post_model->delete_many( array(3,4,5));
//DELETE FROM `posts` WHERE `id` IN (3, 4, 5) 

// dropdown - automatically picks the primary key if only one value passed
$dropdown_array = $this->post_model->dropdown( 'title');
//SELECT `id`, `title` FROM (`posts`)


// dropdown manually set value and key
$dropdown_array = $this->post_model->dropdown( 'title', 'content');
//SELECT `title`, `content` FROM (`posts`)


// Code inside Posts Controller

$joined_records = $this->post_model->post_info()->get_by('posts.id',5);

// Code inside Post Model

public function post_info()
{
	$this->db->join('categories', 'categories.id = posts.category_id');
	return $this; 
}

// Code inside Posts Controller

$order_records = $this->post_model->post_order()->get_all();

// Code inside Post Model

public function post_order()
{
	$this->db->order_by('title', 'ASC');

	return $this; 
}

// Code inside Posts Controller

$order_records = $this->post_model->post_info()->post_order()->get_all();

// 

if (!$this->ion_auth->logged_in())
{
	redirect('auth/login');
}

//Example 1. Use in Controller Constructor

public function __construct()
{
    parent::__construct();
    if (!$this->ion_auth->logged_in())
    {
    	redirect('auth/login');
    }
}

//Example 2. Use in Controller Method

public function index()
{
	if (!$this->ion_auth->logged_in())
    {
    	redirect('auth/login');
    }

	$this->data['records'] = $this->post_model->get_all();
	$this->render('posts/index');
}

if (!$this->ion_auth->is_admin())
{
	$this->session->set_flashdata('message', 'You must be an admin to view this page');
	redirect('welcome/index');
}

$group = array('editor', 'contributor');

if (!$this->ion_auth->in_group($group))
	$this->session->set_flashdata('message', 'You must be a editor OR a contributor to view this page');
	redirect('welcome/index');
}







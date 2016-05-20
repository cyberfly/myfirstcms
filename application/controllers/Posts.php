<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends Editor_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
		$this->load->model('category_model');

		//check login dan check admin kat 
		//Admin_Controller dlm MY_Controller.php

		// paparkan semua session
		// var_dump($this->session->userdata());
		// echo "<br>";
		// echo "<br>";
		// papar single session item
		// echo $this->session->email;
		// exit;

	}

	public function index()
	{
 		// if editor, filter by user_id
 		// if admin, get_all()

		$group = 'editor';

		if ($this->ion_auth->in_group($group))
		{
			$post_records = $this->post_model->post_info()->get_many_by('user_id',$this->session->user_id);
		}
		else if ($this->ion_auth->in_group('student'))
		{
			$post_records = $this->post_model->post_info()->get_many_by('faculty_id',$this->current_user->faculty_id);
		}
		else{
			$post_records = $this->post_model->post_info()->get_all();
		}

		// last query for show the query that was running
		// useful for development debug

		//$last_query = $this->db->last_query();

		$this->data['records'] = $post_records;

		$this->render('posts/index');
	}

	public function create()
	{
		// validation rules

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		// bila visit page atau validation error, paparkan page

		if ($this->form_validation->run() == FALSE) 
		{
			// dapatkan data dari table categories guna category_model

			$category_records = $this->category_model->dropdown('category_name');

			// passkan data ke view

			$this->data['category_records'] = $category_records;

			// render the view

			$this->render('posts/create');
		}
		else
		{
			//bila validation berjaya, baru insert to db
			
			// dapatkan value dari form
			$title = $this->input->post('title');
			$content = $this->input->post('content');
			$category_id = $this->input->post('category_id');

			// minta logged in user ID dari ION AUTH

			// $user_id = $this->ion_auth->user()->row()->id;

			$insert_data = array(
							'title'=>$title,
							'content'=>$content,
							'category_id'=>$category_id,
							'user_id'=>$this->user_id
							);

			// insert to db via post model

			$post_id = $this->post_model->insert($insert_data);

			// if success, will return ID and redirect
			if ($post_id) {
				
				$this->session->set_flashdata('success', 'Record successfully inserted!');

				redirect('posts/index');
			}
		}

	}

	public function edit()
	{
		// validation rules

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		// dapatkan ID dari URL
		$post_id = $this->uri->segment(3, 0);

		if ($this->form_validation->run() == FALSE) 
		{
			// bila submit form, tiada lagi ID pada URL
			// oleh itu, kita perlu
			// dapatkan ID dari hidden field when submit

			if (empty($post_id)) {
				$post_id = $this->input->post('post_id');
			}

			// dapatkan maklumat single record using ID
			$records = $this->post_model->get($post_id);

			// dapatkan data dari table categories guna category_model

			$category_records = $this->category_model->dropdown('category_name');

			//pass data to views

			$this->data['records'] = $records;
			$this->data['category_records'] = $category_records;

			// paparkan view kepada pengguna

			$this->render('posts/edit');
		}
		else
		{
			// dapatkan value dari form
			$post_id = $this->input->post('post_id');
			$title = $this->input->post('title');
			$content = $this->input->post('content');
			$category_id = $this->input->post('category_id');

			// letakkan variable ke dalam array
			$update_data = array(
							'title'=>$title,
							'content'=>$content,
							'category_id'=>$category_id
							);

			//suruh post_model update

			$result = $this->post_model->update($post_id,$update_data);

			// kalau berjaya, redirect to current page

			if ($result) {
				$this->session->set_flashdata('success', 'Record successfully updated!');

				redirect('posts/edit/'.$post_id);
			}

		}
	}

	public function show()
	{
		echo 'show post';
	}

	public function delete()
	{
		// dapatkan hidden field ID
		$post_id = $this->input->post('post_id');

		$result = $this->post_model->delete($post_id);

		if ($result) {
			$this->session->set_flashdata('success', 'Record successfully deleted!');

			redirect('posts/index/');
		}
	}


}

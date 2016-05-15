<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends MY_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('post_model');
	}

	public function index()
	{
		$this->data['records'] = $this->post_model->get_all();
		$this->render('posts/index');
	}

	public function create()
	{
		if ($this->form_validation->run() == FALSE) 
		{
			$this->render('posts/create');
		}
		else{
			$this->session->set_flashdata('success', 'Record created');
			redirect("posts", 'refresh');
		}
		
	}

	public function edit()
	{
		$post_id = $this->uri->segment(3, 0);

		if ($this->form_validation->run() == FALSE) 
		{
			if (empty($post_id)) {
				$post_id = $this->input->post('post_id');
			}

			$this->data['records'] = $this->post_model->get($post_id);
			$this->render('posts/edit');
		}
		else{
			$this->session->set_flashdata('success', 'Record updated');
			redirect("posts/edit/$post_id", 'refresh');
		}
	}

	public function show()
	{
		$post_id = $this->uri->segment(3, 0);

		$this->data['records'] = $this->post_model->post_info()->get_by('posts.id',$post_id);
		$this->render('posts/show');
	}

	public function delete()
	{
		$post_id = $this->input->post('post_id');
		
		$this->post_model->delete($post_id);

		$this->session->set_flashdata('success', 'Record deleted');
		redirect("posts", 'refresh');

	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
	}

	public function index()
	{
		$category_records = $this->category_model->get_all();

		$this->data['records'] = $category_records;

		$this->render('categories/index');
	}

	public function create()
	{
		// validation rules

		$this->form_validation->set_rules('category_name', 'Category Name', 'required');
		$this->form_validation->set_rules('category_description', 'Category Description', 'required');

		// bila visit page atau validation error, paparkan page

		if ($this->form_validation->run() == FALSE) 
		{

			// render the view

			$this->render('categories/create');
		}
		else
		{
			//bila validation berjaya, baru insert to db
			
			// dapatkan value dari form
			$category_name = $this->input->post('category_name');
			$category_description = $this->input->post('category_description');

			$insert_data = array(
							'category_name'=>$category_name,
							'category_description'=>$category_description
							);

			// insert to db via category model

			$category_id = $this->category_model->insert($insert_data);

			// if success, will return ID and redirect
			if ($category_id) {
				
				$this->session->set_flashdata('success', 'Record successfully inserted!');

				redirect('categories/index');
			}
		}

	}

	public function edit()
	{
		// validation rules

		$this->form_validation->set_rules('category_name', 'Category Name', 'required');
		$this->form_validation->set_rules('category_description', 'Category Description', 'required');

		// dapatkan ID dari URL
		$category_id = $this->uri->segment(3, 0);

		if ($this->form_validation->run() == FALSE) 
		{
			// bila submit form, tiada lagi ID pada URL
			// oleh itu, kita perlu
			// dapatkan ID dari hidden field when submit

			if (empty($category_id)) {
				$category_id = $this->input->post('category_id');
			}

			// dapatkan maklumat single record using ID
			$records = $this->category_model->get($category_id);

			//pass data to views

			$this->data['records'] = $records;

			// paparkan view kepada pengguna

			$this->render('categories/edit');
		}
		else
		{
			// dapatkan value dari form
			$category_id = $this->input->post('category_id');
			// dapatkan value dari form
			$category_name = $this->input->post('category_name');
			$category_description = $this->input->post('category_description');

			// letakkan variable ke dalam array
			$update_data = array(
							'category_name'=>$category_name,
							'category_description'=>$category_description
							);

			//suruh category_model update

			$result = $this->category_model->update($category_id,$update_data);

			// kalau berjaya, redirect to current page

			if ($result) {
				$this->session->set_flashdata('success', 'Record successfully updated!');

				redirect('categories/edit/'.$category_id);
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
		$category_id = $this->input->post('category_id');

		$result = $this->category_model->delete($category_id);

		if ($result) {
			$this->session->set_flashdata('success', 'Record successfully deleted!');

			redirect('categories/index/');
		}
	}


}

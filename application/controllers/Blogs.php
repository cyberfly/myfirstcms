<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
	}


	public function index()
	{
		// minta post model hantar senarai post

		$post_records = $this->post_model->get_all();

		// passkan data kepada VIEW

		$this->data['post_records'] = $post_records;

		//second parameter fungsi ialah pilih folder master layout yang ingin di gunakan

		// by default, loaded template ialah folder backend

		// jika specify, CI akan cari views/templates/paremeter/index.php

		//contoh dibawah, CI akan load views/templates/frontend/index.php 

		// render the VIEW

		$this->render('blogs/index','frontend');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends Admin_Controller {

	public function index()
	{
		/*
		1. Semua programming Logic perlu di buat dalam Controller
		*/

		$current_pagetitle = 'Home';

		if ($isset($_GET['page']) && ($_GET['page']=='bloglist')) {
			$current_pagetitle = 'Blog List';
		}

		/*
		2. Untuk dapatkan maklumat dari database, CONTROLLER akan minta dari MODEL.
		MODEL akan menguruskan segala perihal database, dan CONTROLLER hanya perlu bagi arahan
		*/

		$this->load->model('article');
		$article_records = $this->article->latest_articles();

		/*
		4. Controller perlu hantar maklumat di perlukan oleh VIEW melalui variable $data.
		Dalam VIEW, maklumat ini boleh di akses melalui variable $current_pagetitle dan $article_records
		*/

		$data['current_pagetitle'] = $current_pagetitle;
		$data['article_records'] = $article_records;

		/*
		5. Controller akan passkan variable $data kepada VIEW
		*/

		$this->load->view('articles/index',$data);
	}

}

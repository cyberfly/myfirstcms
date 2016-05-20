<?php

class MY_Controller extends CI_Controller
{

  protected $data = array();

  function __construct()
  {
    parent::__construct();
    $this->data['pagetitle'] = 'My First CMS';
    $this->current_datetime = date("Y-m-d H:i:s");
    $this->get_user_info();
  }

  protected function render($the_view = NULL, $template = 'backend')
  {
      if($template == 'json' || $this->input->is_ajax_request())
      {
          header('Content-Type: application/json');
          echo json_encode($this->data);
      }
      elseif(is_null($template))
      {
          $this->load->view($the_view,$this->data);
      }
      else
      {
          $this->data['content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);
          $this->load->view('templates/'.$template.'/index', $this->data);
      }
  }

  // new function go get all user info

  protected function get_user_info()
  {
      //var_dump($this->session->userdata());
      //exit;

      //var_dump($this->ion_auth->user()->row());
      //exit();

      $this->current_user = array();

      // check for login user only fetch user info

      if ($this->ion_auth->logged_in())
      {
          // dapatkan maklumat current user dari ion auth

          $this->current_user = $this->ion_auth->user()->row();

          // kalau student, dapatkan students info

          $group = array('student');

          if ($this->ion_auth->in_group($group))
          {  
            $this->load->model('students_model');

            $students_info = $this->students_model->get_by('user_id',$this->current_user->id);

            // merge maklumat current user dengan students_info ke dalam merge_info

            $merge_info = (object)array_merge((array)$this->current_user, (array)$students_info);
            
            // assign merge_info kepada current_user

            $this->current_user =  $merge_info;

            //var_dump($this->current_user);
            //exit;

          }
      }
  }

}

class Admin_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    
    // only login user can manage POSTS

    if (!$this->ion_auth->logged_in())
    {
      redirect('auth/login');
    }

    // only admin can manage

    if (!$this->ion_auth->is_admin())
    {
      echo "Sorry, you are not admin. Please try next year.";

      exit;
    }

    //define global access user_id variable

    $this->user_id =  $this->ion_auth->user()->row()->id;

  }
}

class Public_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
  }
}

// new Editor Controller

class Editor_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    
    // only login user can manage POSTS

    if (!$this->ion_auth->logged_in())
    {
      redirect('auth/login');
    }

    // only admin and editor can manage
    // but editor can manage his own post only

    $group = array('admin', 'editor','student');

    if (!$this->ion_auth->in_group($group))
    {  
      echo "Sorry, you are not admin. Please try next year.";

      exit;

    }

    //define global access user_id variable

    $this->user_id =  $this->ion_auth->user()->row()->id;

  }
}


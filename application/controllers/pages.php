<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

   /**
    * Class constructor
    */
   public function __construct()
   {
      parent::__construct();

      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->database();

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
   }

   /**
    * Index Page for this controller
    */
   public function index()
	{
      // Data to be passed to views
      $data['page_title'] = 'List of Pages';
      $data['menu_item'] = 'Pages';

      // List of users
      // get_all_users_with_group() added to library by me
		$data['users'] = $this->ion_auth->get_all_users_with_group()->result_array();

      if (!$this->ion_auth->logged_in())
      {
         redirect('account/login');
      }
      else
      {
         if ($this->ion_auth->is_admin())
         {
            // Loading views
            $this->load->view('template/header', $data);
            $this->load->view('page_view', $data);
            $this->load->view('template/footer');
         }
         else
         {
            redirect('unauthorized');
         }
      }
   }

   /**
    * Add a new user
    */
   public function add()
   {
      // Data to be passed to views
      $data['page_title'] = 'Add new Page';
      $data['menu_item'] = 'Pages';

      // Data for edit form, here are empty to avoid error
      $data['edit_admin_values'] = array('username' => '', 'email' => '');
      $data['edit_admin_values2'] = array('name' => '');

      if (!$this->ion_auth->is_admin())
      {
         redirect('unauthorized');
      }
      else
      {
         
      }
   }

   

}

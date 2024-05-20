<?php
class Landing_Page extends CI_Controller {

	public function index() 
	{
		

		$this->load->view('templates/header');
		$this->load->view('landing_page');
		$this->load->view('templates/footer');
	}
}

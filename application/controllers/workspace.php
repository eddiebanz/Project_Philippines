<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class workspace extends CI_Controller {

	public function __construct()	{
		parent::__construct();
		$this->load->Model('template');
	}

	public function index()	{
		$this->template->getone();
		$this->load->view('crawler_template', array( "default_ID"=>$this->session->userdata('site_id'),
											"results"=>$results) );
	}

}
//end of main controller
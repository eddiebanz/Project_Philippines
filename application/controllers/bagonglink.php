<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bagonglink extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('Sites');
	}

	public function index()
	{
		$this->load->view('index_newlink');
	}

	public function dagdag()
	{

	}
}
//end of main controller
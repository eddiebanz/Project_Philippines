<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('happening');
	}

	public function adventure()
	{
		$this->load->view('adventure');
	}	

	public function road()
	{
		$this->load->view('road');
	}

	public function friends()
	{
		$this->load->view('friends');
	}
}

//end of main controller
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crawler extends CI_Controller {

	public function __construct()	{
		parent::__construct();
		$this->load->Model('Sites');
	}

	public function index()	{
		if (!$this->session->userdata('site_id') ){ 
			$site_id = 1;
			$this->session->set_userdata('site_id',$site_id);
		}
		
		$results = $this->Sites->getsites();
		$this->load->view('crawler', array( "default_ID"=>$this->session->userdata('site_id'),
											"results"=>$results) );
	}

	public function partial_link(){
		echo 'i am here in partial link';
		$subpages = $this->Sites->getsubpages($this->session->userdata('site_id'));
		var_dump($subpages);die;
		$this->load->view('partial/partial_link',array("subpages"=>$subpages));
	}

	public function addnewsite()	{
		$this->Sites->addnewlink();
		$this->index();
	}

	public function update_crawler(){
		$this->Sites->addcrawl();
		redirect("/gapang/index"); 
	}

	public function getlinks(){
		$this->load->library('panggapang');
		$this->panggapang->gapanging();
		$this->index();
	}
}
//end of main controller
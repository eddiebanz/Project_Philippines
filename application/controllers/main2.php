<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main2 extends CI_Controller {

	public 	function __construct()
	{
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('date');
    $this->load->model('Users','',TRUE);
	}

	public function index()
	{
		//index of our controller
		//load the mongodb library
		$this->load->library('mongo_db');

		//connect to mongodb collection named as 'category' using our mongodb library
		$collection = $this->mongo_db->db->selectCollection('category');

		//fetch the record from that collection
		$result=$collection->find();
		foreach($result as $document) {
			//display the records
			var_dump($document);
		}
	}
}
//end of main controller
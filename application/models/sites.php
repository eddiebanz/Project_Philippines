<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sites extends CI_Model {
		// die('<pre>'.print_r($this->db, true).'</pre>');
	public function getsites(){

		return $this->db->query("SELECT * FROM sites")->result_array();
	}

	public function getsubpages($id) 
	{
		return $this->db->query("SELECT * FROM scrapper WHERE main_site_id = $id ORDER BY ref_link")->result_array();
	}

	public function addnewlink()
	{	
		// check if the site is unique
		$query = "Select * FROM sites WHERE site_address =?";
		$result = $this->db->query($query, $this->input->post('newlink'));
		if ($result->num_rows() == 0){
			$query = "INSERT into sites (site_address, site_owner, level) values(?,?,?)";
			$this->db->query($query, array($this->input->post('newlink'),
											$this->input->post('site_owner'),
											$this->input->post('level')	));
		}
		return;
	}

	public function addcrawl()
	{
		// check current value in the table, then flip the value between Y/N
		$query = "SELECT scrape FROM scrapper WHERE main_site_id = ? AND ref_link = ? AND link_id = ?";
		$scrapeValue = $this->db->query($query, array($this->input->post('main_site_id'),
										$this->input->post('ref_link'),
										$this->input->post('link_id') )	)->row_array();
		if ($scrapeValue['scrape'] == 'Y') {$scrapeValue = 'N';}
		else {$scrapeValue= 'Y';}
		// update the table with the proper value
		$query = "UPDATE scrapper SET scrape=? WHERE main_site_id = ? AND ref_link = ? AND link_id = ?";
		$this->db->query($query, array($scrapeValue,
										$this->input->post('main_site_id'),
										$this->input->post('ref_link'),
										$this->input->post('link_id') )	);
		return;
	}

	public function get_crawlRecords()
	{
		return $this->db->query("SELECT * FROM sites WHERE drill = 'Y' AND status = 'Pending'")->result_array();
	}


	public function get_drillRecords($site_id)
	{
		return $this->db->query("SELECT * FROM scrapper WHERE main_site_id =? AND drill = 'Y' AND drillStatus = 'Not Started'",$site_id)->result_array();
	}

	public function update_drillLinks($site_id)
	{
		$this->db->query("UPDATE sites SET drill='N', status='Completed' WHERE site_id =?",$site_id);
		return;
	}

	public function updateDocument($hrefLinks) 
    {
    	$query = "UPDATE scrapper SET drill='N', drillStatus = 'Completed' WHERE main_site_id = ? AND ref_link = ? AND link_id = ?";
        $this->db->query($query, array($hrefLinks['main_site_id'], $hrefLinks['ref_link'],$hrefLinks['link_id']));
        return;
    }

    public function get_lastLinkID($hrefLinks)
    {
    	$query = 'SELECT max(link_id),link_id FROM scrapper WHERE main_site_id = ?';
    	return $this->db->query($query,$hrefLinks['main_site_id'])->row_array();
    }

    public function add_newLink($values)
    {
    	$query = "INSERT INTO scrapper (main_site_id, ref_link, link_id) VALUES (?,?,?)";
    	$this->db->query($query,$values);
    	return;
    }

    public function get_duplicate($site)
    {
    	return $this->db->query('SELECT * FROM scrapper WHERE ref_link = ?', $site)->result_array();
    }
}
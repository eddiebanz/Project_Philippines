<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class panggapang {

	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('Sites'); 	
	}
	
	public function gapanging()
	{
		// This program aims only to find links from a website and store the info in a database.
		// A user process will be necessary to select which link will be scrapped for specific info.
		// Another program will then read through the selected record for sampling, then the actual scraping itself

		// get the details of the site to determine how many levels to drill
		$results = $this->CI->Sites->get_crawlRecords();
		$first = 'Y';
		// loop through the list
		foreach ($results as $key) {
			if ($first == 'Y'){
				$this->session->set_userdata('site_id',$key['site_id']);
				$first = 'N';
			}

			// set runtime to only 10 minutes
			set_time_limit(600);
			for($loopCounter = 0; $loopCounter <= $key['level']; $loopCounter++)
			{
				// get the first link
				$query_results = $this->CI->Sites->get_drillRecords($key['site_id']);
				if (count($query_results) == 0 ){
					
					// update the site record
					$this->CI->Sites->update_drillLinks($key['site_id']);
					$loopCounter = $key['level'];
				}
				else{
					foreach ($query_results as $listing){
						$this->grabAnchors($listing,$key['site_address']);
					}
				}
			}
			// update the site record
			$this->CI->Sites->update_drillLinks($key['site_id']);
		}
		return;
	}

	// these are the PRIVATE functions for crawling

	private function curlHREF($url)
	{
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
	    $data = curl_exec($ch);
	    $info = curl_getinfo($ch);  
	    curl_close($ch);
    	$array = explode("<", html_entity_decode($data));
    	return $array;
    }

	private function getHREF($text)
	{
        $pos  = strpos($text, "href=") + 6;
        $temp = substr($text,$pos, strlen($text));
        $pos2 = strpos($temp, '"');
        return substr($text, $pos, $pos2);
    }

    private function getStart($arraylist)
    {
        // get the line counter for the body. 
        // anything above the body is irrelevant
        for ($counter = 0; $counter < count($arraylist); $counter++)
        {
            if (substr($arraylist[$counter],0,2) === "a ") 
            {
                return $counter;
            }
        }
        // if no a-html-tag is found, return the last index of the array
        return count($arraylist);
    }

    private function getLast($arraylist, $starting)
    {
        // get the line counter for the body. 
        // anything above the body is irrelevant
        for ($counter = $starting; $counter < count($arraylist); $counter++)
        {
            if (substr($arraylist[$counter],0,2) !== "a ") 
            {
                return $counter-1;
            }
        }
        return $starting;
    }

    private function excludLink($text, $main_site)
    {
		// include in the ignore list anyhing that does not share the parent link
		// ignore the links that have any of the following
		// convert the link to lower case to standardize the case
		$text = strtolower($text);
    	if ( ( strpos($text, 'sitemap.xml') > 0)||
    		 ( strpos($text, '/?share') > 0)	||
    		 ( strpos($text, 'class=') > 0)		||
    		 ( strpos($text, '/404-error/') > 0)||
    		 ( strpos($text, '.jpg') > 0)		||
    		 ( strpos($text, '.gif') > 0)		||
    		 ( strpos($text, '.bmp') > 0)		||
    		 ( strpos($text, '.pdf') > 0)		||
    		 ( strpos($text, '#') != 0)			||
    		 ( strpos($text, '/podcast') > 0)	||
             ( strpos($text, '/page/') > 0)     ||
             ( strpos($text, $main_site) !== 0)  ||
             ( $text === "")
    		)
    	{
    		// if any of the above is true,
    		// then ignore the link (exclude = true)
    		// otherwise, do not ignore the link (exclude = false)
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

    private function checkduplicate($text)
    {
		// if the last string is a forward slash, then remove the forward slash and re-evaluate
		if (substr($text,strlen($text)-1,1) !=='/')
		{
			$text = $text.'/';
		}

		$query_result = $this->CI->Sites->get_duplicate($text);
        if ( count($query_result) == 0)
		{
			return true;
		}

		return false;
    }

    private function grabAnchors ($hrefLinks, $main_site)
    {
        // grab the last id for this main site
        $result = $this->CI->Sites->get_lastLinkID($hrefLinks);
        $id = intval($result['link_id']);

		// cURL the link and dump into the array the result       
		$array = $this->curlHREF($hrefLinks['ref_link']);
		sort($array);

		// $array is returned as sorted array. get the fist and last
		// index of the a-html-tag and start the loop from there
		// anything else can be ignored
		// get begin index
		$startpos = $this->getStart($array);
		// get last index
		$endpos = $this->getLast($array, $startpos);
		// if startpos = endpos, it would mean that the a-html-tag is not found properly
		// update the document and exit
		if ($startpos == $endpos){
			$this->CI->Sites->updateDocument($hrefLinks);
			return;
		}
		
		// start parsing the a-html-tag
	    for ($i = $startpos; $i <= $endpos ; $i++) 
	    {
            // extract the href from the a-html-tag
    		$href_a= $this->getHREF($array[$i]);
    		// check if link if to be excluded
    		if ($this->excludLink($href_a, $main_site) === false) 
    		{
	    		if ($this->checkduplicate($href_a) === true)
	    		{    
                    $id = $id + 1;
                    $value = array($hrefLinks['main_site_id'], $href_a, $id);
	    			$query = $this->CI->Sites->add_newLink($value);
				}
			}
		}
		// update the document after the parsing of the a-html-tag
		$this->CI->Sites->updateDocument($hrefLinks);
        return;
	}
}
?>
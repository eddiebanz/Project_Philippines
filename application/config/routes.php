<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['404_override'] = '';

// ere mga ruta pr mkuha ang mga nilalaman

$route['getsubpages/:id'] = 'getsubpages';
$route['addnewsite'] = 'Crawler/addnewsite';
$route['updatelist'] = 'Crawler/updatelist';
$route['update_crawler'] = 'Crawler/update_crawler';

// e2 pr s 
$route['workspace'] = 'workspace/index';

// e2 ang ggapang
$route['gapang/index'] = 'crawler';
$route['gapangin'] = 'Crawler/getlinks';


//end of routes.php

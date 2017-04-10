<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	development process

*/

/*
|--------------------------------------------------------------------------
| Image Site URL
|--------------------------------------------------------------------------
|
| Ini adalah setting buatan kunglaw
| tujuannya adalah untuk meletakkan url folder ke gambar 
| atau hasil upload gambar
|	
|
| 
| 
|
*/
$base_name = "localhost";
$base = "resources/assets";
$base_img = "resources/upload";

$config['img_url']     	  	= "http://$base_name/capex/$base";
$config['asset_url']   	  	= "http://$base_name/capex/$base";

// path
$config["img_path"]  		= $base_img;
$config['asset_path'] 	    = $config["asset_url"];

$config['css_path'] 		= $base.'/css/';
$config['download_path'] 	= $base.'/download/';
$config['less_path'] 		= $base.'/less/';
$config['js_path'] 		    = $base.'/js/';

$config['swf_path'] 		= $base.'/swf/';
$config['upload_path'] 	    = $base.'/upload/';
$config['xml_path'] 		= $base.'/xml/';
$config['plugin_path'] 	    = $base.'/plugins/';
$config['bower_path'] 	    = $base.'/bower_components/';
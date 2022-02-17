<?php

defined('BASEPATH') OR exit('No direct script access allowed');



if ( ! function_exists('asset_path'))
{
	function asset_path($path=NULL){
		return base_url().'assets/'.$path;
	}	
}


if ( ! function_exists('file_path'))
{
	function file_path($eid=NULL)
	{
		if ($eid != '') {
      		return base_url().'index.php/'.$eid.'/';
    	}
		else
		{
      		return base_url().'index.php/';
    	}
		
	}
}


if ( ! function_exists('upload_path'))
{
	function upload_path(){
		return base_url().'upload/';
	}	
}


if ( ! function_exists('media_path'))
{
	function media_path($folder=NULL) 
	{
		$path = FCPATH.'upload/media/';  
		return $path;
	}
}


function is_login($type=NULL){
	
	 $CI =& get_instance();
	
	if($type=="emp"){
		
		$user = $CI->session->userdata('rk_emp');
		
		if (is_array($user) && $user['login']=='true')
		{
			return true;
			
		}else{
			
			return false;
			
		}
	}else if($type=="client"){
		
		$user = $CI->session->userdata('rk_client');
		
		if (is_array($user) && $user['login']=='true')
		{
			return true;
			
		}else{
			
			return false;
			
		}
	}else if($type=="admin"){
		
		$user = $CI->session->userdata('rk_admin');
		
		if (is_array($user) && $user['login']=='true')
		{
			return true;
			
		}else{
			
			return false;
			
		}
	}else{
		
		return false;
		
	}
		
	
}
function is_logged_admin($adm=NULL){
	
    $CI =& get_instance();
	
    $user = $CI->session->userdata('rk_admin');
		
		
			
		if (is_array($user) && $user['login']=='true')
		{
			
		
			
			if($user['admin']=='true'){
		
				return true;
			}
			

		
			return false;	
			
			
			
		}
		
		else
		{ 
			return false; 
		}
}


if ( ! function_exists('filter_data')){
	
	function filter_data( $data ){
		
		$CI 	=	& get_instance();
		
		if (is_array($data)){
			
			foreach ($data as $key => &$value){
				
   				$value = stripslashes($value);
		
   				$value = htmlspecialchars($value);
				
				$value = strip_tags($value);
				
				$data[$key] = $value;
				
			}
		}else{
		
			$data = stripslashes($data);
			
			$data = htmlspecialchars($data);
			
			$data = strip_tags($data);
		
		}
		
		$data = $CI->security->xss_clean($data);
		
  	    return $data;
	}
}

if ( ! function_exists('filter_tag')){
	
	function filter_tag( $text )
	{
		// PHP's strip_tags() function will remove tags, but it
		// doesn't remove scripts, styles, and other unwanted
		// invisible text between tags.  Also, as a prelude to
		// tokenizing the text, we need to insure that when
		// block-level tags (such as <p> or <div>) are removed,
		// neighboring words aren't joined.
		$text = preg_replace(
			array(
				// Remove invisible content
				'@<head[^>]*?>.*?</head>@siu',
				'@<style[^>]*?>.*?</style>@siu',
				'@<script[^>]*?.*?</script>@siu',
				'@<object[^>]*?.*?</object>@siu',
				'@<embed[^>]*?.*?</embed>@siu',
				'@<applet[^>]*?.*?</applet>@siu',
				'@<noframes[^>]*?.*?</noframes>@siu',
				'@<noscript[^>]*?.*?</noscript>@siu',
				'@<noembed[^>]*?.*?</noembed>@siu',
	
				// Add line breaks before & after blocks
				'@<((br)|(hr))@iu',
				'@</?((address)|(blockquote)|(center)|(del))@iu',
				'@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
				'@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
				'@</?((table)|(th)|(td)|(caption))@iu',
				'@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
				'@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
				'@</?((frameset)|(frame)|(iframe))@iu',
			),
			array(
				' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
				"\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
				"\n\$0", "\n\$0",
			),
			$text );
	
		// Remove all remaining tags and comments and return.
		$text =  strip_tags($text);
	
		return getUrls(nl2br($text));
	}
}

if ( ! function_exists('time_ago')){
			
		function time_ago($timestamp){  
		
				$time_ago = $timestamp;  
				$current_time = time();  
				$time_difference = $current_time - $time_ago;  
				$seconds = $time_difference;  
				$minutes      = round($seconds / 60 );           // value 60 is seconds  
				$hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
				$days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
				$weeks          = round($seconds / 604800);          // 7*24*60*60;  
				$months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
				$years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
			
				if($seconds <= 60){  
					
					return "Just Now";  

				}else if($minutes <=60) {  

					if($minutes==1){  

						return "1 min";  
					}  
					else{  

						return "$minutes min";  
					} 

				}else if($hours <=24){ 

					if($hours==1){ 

						return "an hour ago";  

					}else{  

						return "$hours hrs ";  
					}  
				}else if($days <= 7){  

					if($days==1){  

						return "yesterday";  

					}else{ 

						return "$days days";  
					}  
				}else if($weeks <= 4.3){ //4.3 == 52/12  

					if($weeks==1){  

						return "a week"; 

					}else{  

						return "$weeks w";  

					}  
				}else if($months <=12){  

					if($months==1){  

						return "a month ago";  

					}else{  

						return "$months m"; 

					}  

				}else{  

					if($years==1){ 

						return "one year ago";  

					}else{  

						return "$years y";  
					}  

				}
		  
		}  
		
}
if(!function_exists('is_valid_password_pattern'))
{
	function is_valid_password_pattern($password)
	{
		
		$uppercase 		= preg_match('@[A-Z]@', $password);
		$lowercase 		= preg_match('@[a-z]@', $password);
		$number    		= preg_match('@[0-9]@', $password);
		$special_cha 	= preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password);
		
		$min_len	=	6;
		$max_len	=   30; 
		
		if(!$uppercase || !$lowercase || !$number || !$special_cha || strlen($password) < $min_len || strlen($password) > $max_len) {
		 
		 	return FALSE;
		}
		else
		{
			return TRUE;
		}
		
		
	}
	
}

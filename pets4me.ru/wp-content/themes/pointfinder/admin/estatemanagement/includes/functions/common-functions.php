<?php

/**********************************************************************************************************************************
*
* Common functions for pf system
* 
* Author: Webbu Design
* Please do not modify below functions.
***********************************************************************************************************************************/


function pointfinder_pfstring2AdvArray($results,$keyname, $kv = ',',$uearr_count) {
	$user_ids = '';
	if (!empty($results) && is_array($results)) {
		$uek = 1;
		foreach ($results as $result) {
			if (isset($result[$keyname])) {
				$user_ids .= $result[$keyname];
				if ($uek != $uearr_count) {$user_ids .= ',';}
			}
		$uek++;
		}
	}
	return $user_ids;
} 


function pointfinder_agentitemcount_calc($agent_id, $setup3_pointposttype_pt1,$request_type){

	global $wpdb;


	/* Find; Post ID's which defines as agent */
		$adpi_agentresults = $wpdb->get_results(
			$wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key like %s AND meta_value = %d",'webbupointfinder_item_agents',$agent_id),'ARRAY_A');

		$adpi_agentcount = count($adpi_agentresults);
		$adpi_agentresults = pointfinder_pfstring2AdvArray($adpi_agentresults,'post_id',',',$adpi_agentcount); 
		// Geri dönen post idler zaten agent olarak tanımlanmış idler. Bu idleri tekrar saymamak için post_notin de kullan.

	
	/* Find; User IDS which linked with agent. */
		$adpi_userresults = $wpdb->get_results($wpdb->prepare("SELECT user_id FROM $wpdb->usermeta where meta_key like %s and meta_value = %d",'user_agent_link',$agent_id),'ARRAY_A');

		$adpi_usercount = count($adpi_userresults);
		$adpi_userresults = pointfinder_pfstring2AdvArray($adpi_userresults,'user_id',',',$adpi_usercount);
		// Geri dönen idler link yapılan userların id si. 


	/* Find; posts which belongs to this agent */

		/* before v1.7.2
		$adpi_totalfromposts = $wpdb->get_results(
			$wpdb->prepare("SELECT $wpdb->posts.ID FROM 
				
				$wpdb->posts 

				LEFT JOIN $wpdb->postmeta ON ($wpdb->posts.ID = $wpdb->postmeta.post_id AND $wpdb->postmeta.meta_key = %s) 
				
				LEFT JOIN $wpdb->postmeta AS mt1 ON ( $wpdb->posts.ID = mt1.post_id ) 

				LEFT JOIN $wpdb->postmeta AS mt2 ON ($wpdb->posts.ID = mt2.post_id AND mt2.meta_key = %s ) 

				LEFT JOIN $wpdb->postmeta AS mt3 ON ( $wpdb->posts.ID = mt3.post_id ) 

				WHERE 
				( 
					($wpdb->postmeta.post_id IS NULL OR ( mt1.meta_key = %s AND mt1.meta_value = %d )) AND mt2.post_id IS NULL 
				)

				AND $wpdb->posts.post_type = %s AND $wpdb->posts.post_status = %s AND $wpdb->posts.post_author IN (%s) AND $wpdb->posts.ID NOT IN(%s)

				group by $wpdb->posts.ID",
				

				'pointfinder_item_onoffstatus',
				'webbupointfinder_item_point_visibility',
				'pointfinder_item_onoffstatus',
				0,
				$setup3_pointposttype_pt1,
				'publish',
				$adpi_userresults,
				$adpi_agentresults
			),'ARRAY_A'
		);*/

		$adpi_totalfromposts = $wpdb->get_results(
			$wpdb->prepare("SELECT $wpdb->posts.ID FROM 
				
				$wpdb->posts 

				WHERE $wpdb->posts.post_type = %s AND $wpdb->posts.post_status = %s AND $wpdb->posts.post_author IN (%s) AND $wpdb->posts.ID NOT IN(%s)

				group by $wpdb->posts.ID",

				$setup3_pointposttype_pt1,
				'publish',
				$adpi_userresults,
				$adpi_agentresults
			),'ARRAY_A'
		);

		$adpi_totalfrompostscount = count($adpi_totalfromposts);
		$return_ids = '';

		if ($request_type == 'count') {
			$return_array = array(
				'count'=> $adpi_totalfrompostscount + $adpi_agentcount,
				'ids' => $return_ids
			);

		}else{
			if ($adpi_totalfrompostscount > 0) {
				$return_ids = pointfinder_pfstring2AdvArray($adpi_totalfromposts,'ID',',',$adpi_totalfrompostscount);;
			}

			if ($adpi_agentcount > 0) {
				if ($adpi_totalfrompostscount > 0) {
					$return_ids .= ','.$adpi_agentresults;
				}else{
					$return_ids = $adpi_agentresults;
				}
			}

			$return_array = array(
				'count'=> $adpi_totalfrompostscount + $adpi_agentcount,
				'ids' => $return_ids
				);
		}
		

	return $return_array;
}

/**
*Start: Attachment function
**/
	function pft_insert_attachment($file_handler,$setthumb='false') {
		if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		require_once(ABSPATH . "wp-admin" . '/includes/media.php');

		$attach_id = media_handle_upload( $file_handler, 0);

		return $attach_id;
	}
/**
*End: Attachment function
**/



/**
*Start:General Functions
**/
	/*
	Deprecated with v1.7.1.8
	function FindListingTypeField(){
		global $pfsearchfields_options;
		//$pfsearchfields_options = get_option('pfsearchfields_options');
		$keyname = array_search('pointfinderltypes',$pfsearchfields_options);
		
		if($keyname != ''){ 
			$keynameexp = explode('_',$keyname);
			if(array_search('posttax', $keynameexp)){
				$keycount = count($keynameexp);
				

				if ($keycount >= 2) {
					$keycountx = $keycount - 1;
					unset($keynameexp[0]);
					unset($keynameexp[$keycountx]);
				}else{
					unset($keynameexp[0]);
				}
				
				if (count($keynameexp) > 1) {
					$new_keyname_exp = '';
					$ik = 0;
					$il = count($keynameexp)-1;

					foreach ($keynameexp as $kvalue) {
						if ($ik < $il) {
							$new_keyname_exp .= $kvalue.'_';
						}else{
							$new_keyname_exp .= $kvalue;
						}
						$ik = $ik+1;
					}
					
					return $new_keyname_exp;
				}else{
					foreach ($keynameexp as $keynvalue) {
						return $keynvalue;
					}
					
				}
			}else{
				return 'none';
			}
			
		}else{
			return 'none';
		}
	}*/

	function pointfinder_find_requestedfields($fieldname){

		global $pfsearchfields_options;

		$keyname = array_search($fieldname,$pfsearchfields_options);

		if($keyname != ''){ 
			$keynameexp = explode('_',$keyname);
			if(array_search('posttax', $keynameexp)){
				$keycount = count($keynameexp);
				
				if ($keycount >= 2) {
					$keycountx = $keycount - 1;
					unset($keynameexp[0]);
					unset($keynameexp[$keycountx]);
				}else{
					unset($keynameexp[0]);
				}
				
				if (count($keynameexp) > 1) {
					$new_keyname_exp = '';
					$ik = 0;
					$il = count($keynameexp)-1;

					foreach ($keynameexp as $kvalue) {
						if ($ik < $il) {
							$new_keyname_exp .= $kvalue.'_';
						}else{
							$new_keyname_exp .= $kvalue;
						}
						$ik = $ik+1;
					}
					
					return $new_keyname_exp;
				}else{
					foreach ($keynameexp as $keynvalue) {
						return $keynvalue;
					}
					
				}
			}else{
				return '';
			}
			
		}else{
			return '';
		}
	}

	function pf_redirect($url){ 
	    if (!headers_sent()){  
	        header('Location: '.$url); exit; 
	    }else{ 
	        echo '<script type="text/javascript">'; 
	        echo 'window.location.href="'.$url.'";'; 
	        echo '</script>'; 
	        echo '<noscript>'; 
	        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />'; 
	        echo '</noscript>'; exit; 
	    } 
	}  

	function pointfinder_post_exists( $id ) {
	  return is_string( get_post_status( $id ) );
	}

	function pfcalculatefavs($user_id){
		
		$user_favorites_arr = get_user_meta( $user_id, 'user_favorites', true );
		
		$latest_fav_count = $new_favorite_count = $favorite_count = 0;
		
		if (!empty($user_favorites_arr)) {
			$user_favorites_arr = json_decode($user_favorites_arr,true);
			$favorite_count = count($user_favorites_arr);
			
			if (!empty($user_favorites_arr)) {
				foreach ($user_favorites_arr as $user_favorites_arr_single) {
					if(pointfinder_post_exists($user_favorites_arr_single)){
						$new_user_fav_arr[] = $user_favorites_arr_single;
					}
				}
			}else{
				$new_user_fav_arr = array();
			}
			

			$new_favorite_count = (!empty($new_user_fav_arr))? count($new_user_fav_arr):0;

			if ($favorite_count !== $new_favorite_count) {
				if (isset($new_user_fav_arr)) {
					update_user_meta($user_id,'user_favorites',json_encode($new_user_fav_arr));
					$latest_fav_count = $new_favorite_count;
				}
				
			}else{
				$latest_fav_count = $favorite_count;
			}
		}

		return $latest_fav_count;
	}

	function pfloadingfunc($message,$type = 'show'){
		echo "<script type='text/javascript'>(function($) {'use strict';";
		if($type == 'show'){
			echo '$(function(){';
				echo '$(".pftsrwcontainer-overlay").pfLoadingOverlayex({action:"show","message":"'.$message.'"});';
			echo '});';
		}else{
			echo "$(function(){setTimeout(function() {";
			echo "$('.pftsrwcontainer-overlay').pfLoadingOverlayex({action:'hide'});";
			echo "}, 1000);});";
		}
		echo "})(jQuery);</script>";
	}

	function pfsocialtoicon($name){
		switch ($name) {
			case 'facebook':
				return 'glyph-770';
				break;
			
			case 'pinterest':
				return 'glyph-810';
				break;

			case 'twitter':
				return 'glyph-769';
				break;

			case 'linkedin':
				return 'glyph-824';
				break;

			case 'google-plus':
				return 'glyph-813';
				break;

			case 'dribbble':
				return 'glyph-969';
				break;

			case 'dropbox':
				return 'glyph-952';
				break;

			case 'flickr':
				return 'glyph-955';
				break;

			case 'github':
				return 'glyph-871';
				break;

			case 'instagram':
				return 'glyph-954';
				break;

			case 'skype':
				return 'glyph-970';
				break;

			case 'rss':
				return 'glyph-914';
				break;

			case 'tumblr':
				return 'glyph-959';
				break;

			case 'vk':
				return 'glyph-980';
				break;

			case 'youtube':
				return 'glyph-947';
				break;
		}
	}

	/* Main Option Fields */
	function PFSAIssetControl($field, $field2 = '', $default = '',$icl_exit = 0){
		global $pointfindertheme_option;

		if (function_exists('icl_t')) {
			$pointfindertheme_option = get_option('pointfindertheme_options');
		}
		
		if($field2 == ''){
			if(isset($pointfindertheme_option[''.$field.'']) == false || $pointfindertheme_option[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pointfindertheme_option[''.$field.''];
				
			}
		}else{
			if(isset($pointfindertheme_option[''.$field.''][''.$field2.'']) == false || $pointfindertheme_option[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pointfindertheme_option[''.$field.''][''.$field2.''];
				
			}
		};
		return $output;
	}
	
	/* Custom Fields */
	function PFCFIssetControl($field, $field2 = '', $default = '',$icl_exit = 0){
		if (function_exists('icl_t')) {
			$pfcustomfields_options = get_option('pfcustomfields_options');
		}else{
			global $pfcustomfields_options;
		}

		if($field2 == ''){
			if(isset($pfcustomfields_options[''.$field.'']) == false || $pfcustomfields_options[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfcustomfields_options[''.$field.''];
				
			}
		}else{
			if(isset($pfcustomfields_options[''.$field.''][''.$field2.'']) == false || $pfcustomfields_options[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfcustomfields_options[''.$field.''][''.$field2.''];
				
			}
		};
		return $output;
	}
		
	/* Search Fields */
	function PFSFIssetControl($field, $field2 = '', $default = '',$icl_exit = 0){
		global $pfsearchfields_options;

		if($field2 == ''){
			if(isset($pfsearchfields_options[''.$field.'']) == false || $pfsearchfields_options[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfsearchfields_options[''.$field.''];
				
			}
		}else{
			if(isset($pfsearchfields_options[''.$field.''][''.$field2.'']) == false || $pfsearchfields_options[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfsearchfields_options[''.$field.''][''.$field2.''];
				
			}
		};

		return $output;
	}

	/* Mail Options */
	function PFMSIssetControl($field, $field2 = '', $default = '',$icl_exit = 0){
		if (function_exists('icl_t')) {
			if (in_array($field, array(
					'setup33_emailsettings_debug',
					'setup33_emailsettings_secure',
					'setup33_emailsettings_auth',
					'setup33_emailsettings_smtpport',
					'setup33_emailsettings_smtp',
					'setup33_emailsettings_auth',
					'setup33_emailsettings_fromemail',
					'setup33_emailsettings_smtpaccount',
					'setup33_emailsettings_ed'
				))) {
				global $pointfindermail_option;
			}else{
				$pointfindermail_option = get_option('pointfindermail_options');
			}
			
		}else{
			global $pointfindermail_option;
		}

		if($field2 == ''){
			if(isset($pointfindermail_option[''.$field.'']) == false || $pointfindermail_option[''.$field.''] == ""){
				$output = $default;
			}else{
				$output = $pointfindermail_option[''.$field.''];
			}
		}else{
			if(isset($pointfindermail_option[''.$field.''][''.$field2.'']) == false || $pointfindermail_option[''.$field.''][''.$field2.''] == ""){
				$output = $default;
			}else{
				$output = $pointfindermail_option[''.$field.''][''.$field2.''];
			}
		};
		return $output;
	}
	
	/* Custom Points */
	function PFPFIssetControl($field, $field2 = '', $default = ''){
		global $pfcustompoints_options;

		if($field2 == ''){if(isset($pfcustompoints_options[''.$field.'']) == false || $pfcustompoints_options[''.$field.''] == ""){$output = $default;}else{$output = $pfcustompoints_options[''.$field.''];}}else{if(isset($pfcustompoints_options[''.$field.''][''.$field2.'']) == false || $pfcustompoints_options[''.$field.''][''.$field2.''] == ""){$output = $default;}else{$output = $pfcustompoints_options[''.$field.''][''.$field2.''];}};
		return $output;
	}

	/* Sidebar Options */
	function PFSBIssetControl($field, $field2 = '', $default = ''){
		global $pfsidebargenerator_options;
		if($field2 == ''){
			if(isset($pfsidebargenerator_options[''.$field.'']) == false || $pfsidebargenerator_options[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfsidebargenerator_options[''.$field.''];
				
			}
		}else{
			if(isset($pfsidebargenerator_options[''.$field.''][''.$field2.'']) == false || $pfsidebargenerator_options[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfsidebargenerator_options[''.$field.''][''.$field2.''];
				
			}
		};
		return $output;
	}

	/* Twitter Widget Options */
	function PFTWIssetControl($field, $field2 = '', $default = ''){
		global $pftwitterwidget_options;
		if($field2 == ''){
			if(isset($pftwitterwidget_options[''.$field.'']) == false || $pftwitterwidget_options[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pftwitterwidget_options[''.$field.''];
				
			}
		}else{
			if(isset($pftwitterwidget_options[''.$field.''][''.$field2.'']) == false || $pftwitterwidget_options[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pftwitterwidget_options[''.$field.''][''.$field2.''];
				
			}
		};
		return $output;
	}

	/* reCaptcha Options */
	function PFRECIssetControl($field, $field2 = '', $default = ''){
		global $pfrecaptcha_options;
		if($field2 == ''){
			if(isset($pfrecaptcha_options[''.$field.'']) == false || $pfrecaptcha_options[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfrecaptcha_options[''.$field.''];
				
			}
		}else{
			if(isset($pfrecaptcha_options[''.$field.''][''.$field2.'']) == false || $pfrecaptcha_options[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfrecaptcha_options[''.$field.''][''.$field2.''];
				
			}
		};
		return $output;
	}

	/* Review System Options */
	function PFREVSIssetControl($field, $field2 = '', $default = '',$icl_exit = 0){
		global $pfitemreviewsystem_options;
		if($field2 == ''){
			if(isset($pfitemreviewsystem_options[''.$field.'']) == false || $pfitemreviewsystem_options[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfitemreviewsystem_options[''.$field.''];
				
			}
		}else{
			if(isset($pfitemreviewsystem_options[''.$field.''][''.$field2.'']) == false || $pfitemreviewsystem_options[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfitemreviewsystem_options[''.$field.''][''.$field2.''];
				
			}
		};
		return $output;
	}

	/* Size System Options */
	function PFSizeSIssetControl($field, $field2 = '', $default = '',$icl_exit = 0){
		global $pfsizecontrol_options;
		if($field2 == ''){
			if(isset($pfsizecontrol_options[''.$field.'']) == false || $pfsizecontrol_options[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfsizecontrol_options[''.$field.''];
				
			}
		}else{
			if(isset($pfsizecontrol_options[''.$field.''][''.$field2.'']) == false || $pfsizecontrol_options[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfsizecontrol_options[''.$field.''][''.$field2.''];
				
			}
		};
		return $output;
	}

	/* Page Builder Options */
	function PFPBSIssetControl($field, $field2 = '', $default = '',$icl_exit = 0){
		global $pfpbcontrol_options;
		if($field2 == ''){
			if(isset($pfpbcontrol_options[''.$field.'']) == false || $pfpbcontrol_options[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfpbcontrol_options[''.$field.''];
				
			}
		}else{
			if(isset($pfpbcontrol_options[''.$field.''][''.$field2.'']) == false || $pfpbcontrol_options[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfpbcontrol_options[''.$field.''][''.$field2.''];
				
			}
		};
		return $output;
	};

	/* Additional Options */
	function PFASSIssetControl($field, $field2 = '', $default = '',$icl_exit = 0){
		global $pfascontrol_options;
		if($field2 == ''){
			if(isset($pfascontrol_options[''.$field.'']) == false || $pfascontrol_options[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfascontrol_options[''.$field.''];
				
			}
		}else{
			if(isset($pfascontrol_options[''.$field.''][''.$field2.'']) == false || $pfascontrol_options[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfascontrol_options[''.$field.''][''.$field2.''];
				
			}
		};
		return $output;
	};

	/* Advanced Options */
	function PFADVIssetControl($field, $field2 = '', $default = '',$icl_exit = 0){
		global $pfadvancedcontrol_options;
		if($field2 == ''){
			if(isset($pfadvancedcontrol_options[''.$field.'']) == false || $pfadvancedcontrol_options[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfadvancedcontrol_options[''.$field.''];
				
			}
		}else{
			if(isset($pfadvancedcontrol_options[''.$field.''][''.$field2.'']) == false || $pfadvancedcontrol_options[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfadvancedcontrol_options[''.$field.''][''.$field2.''];
				
			}
		};
		return $output;
	};

	/* Payment Gateways */
	function PFPGIssetControl($field, $field2 = '', $default = '',$icl_exit = 0){
		global $pfpgcontrol_options;
		if($field2 == ''){
			if(isset($pfpgcontrol_options[''.$field.'']) == false || $pfpgcontrol_options[''.$field.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfpgcontrol_options[''.$field.''];
				
			}
		}else{
			if(isset($pfpgcontrol_options[''.$field.''][''.$field2.'']) == false || $pfpgcontrol_options[''.$field.''][''.$field2.''] == ""){
				$output = $default;
				
			}else{
				$output = $pfpgcontrol_options[''.$field.''][''.$field2.''];
				
			}
		};
		return $output;
	};


	function pf_get_item_term_id($the_post_id){
		$item_term = '';
		if (!empty($the_post_id)) {
			$item_term_get = (!empty($the_post_id)) ? wp_get_post_terms($the_post_id, 'pointfinderltypes', array("fields" => "ids")) : '' ;

			if (count($item_term_get) > 1) {
				if (isset($item_term_get[0])) {
					$find_top_parent = pf_get_term_top_most_parent($item_term_get[0],'pointfinderltypes');
					$item_term = $find_top_parent['parent'];
				}
			}else{
				if (isset($item_term_get[0])) {
					$find_top_parent = pf_get_term_top_most_parent($item_term_get[0],'pointfinderltypes');
					$item_term = $find_top_parent['parent'];
				}
			}
		}
		return $item_term;
	}


	function pf_get_listingmeta_limit($listing_meta, $item_term, $limit_var){
		if (isset($listing_meta[$item_term])) {
			if (isset($listing_meta[$item_term][$limit_var])) {
				if (!empty($listing_meta[$item_term][$limit_var])) {
					$listing_limit_status = $listing_meta[$item_term][$limit_var];
				}else{
					$listing_limit_status = 1;
				}
			}else{
				$listing_limit_status = 1;
			}
		}else{
			$listing_limit_status = 1;
		}
		return $listing_limit_status;
	}
	

	function PFPermalinkCheck(){
		$current_permalinkst = get_option('permalink_structure');

		if ($current_permalinkst == false || $current_permalinkst == '') {
			/* This using ? default. */
			return '&';
		}else{
			$current_permalinkst_last = substr($current_permalinkst, -1);
			if($current_permalinkst_last == '%'){
				return '/?';
			}elseif($current_permalinkst_last == '/'){
				return '?';
			}
		}
	}

	function PFControlEmptyArr($value){
		if(is_array($value)){
			if(count($value)>0){
				return true;
			}else{return false;}
		}else{return false;}
	}


	function pfstring2BasicArray($string, $kv = ',') {
		if($string != ''){
			if(strpos($string, $kv) != false){
				$string_exp = explode($kv,$string);
				foreach($string_exp as $s){
					$ka[]=$s;
				}
			}else{
				return array($string);
			}
		}
		return $ka;} 

	function pfstring2KeyedArray($string, $kv = '=') {
		$ka= '';
		if($string != ''){
		foreach ($string as $s) { 
		  if ($s) {
			if ($pos = strpos($s, $kv)) { 
			  $ka[trim(substr($s, 0, $pos))] = trim(substr($s, $pos + strlen($kv)));
			} else {
			  $ka[] = trim($s);
			}
		  }
		}
		}
		return $ka;} 

	function pfKey2StringedArray($myarray){
		
		$output = array();
		foreach ($myarray as $a) {	
			array_push($output,$a);
		}
		
		return $output;
	}

	function PFCheckStatusofVar($varname){
		$setup1_slides = PFSAIssetControl($varname,'','');
		$checkpfarray = count($setup1_slides);
		
		if(is_array($setup1_slides)){
			if($checkpfarray == 1){
				foreach($setup1_slides as $setup1_slide){
						if (isset($setup1_slide['title'])) {
							if($setup1_slide['title'] != ''){
								$pfstart = true;
							}else{
								$pfstart = false;
							};
						}else{
							$pfstart = false;
						};
						
				};
			}elseif($checkpfarray < 1 || $checkpfarray == NULL){
				$pfstart = false;
			}elseif($checkpfarray > 1 ){
				$pfstart = true;
			}
			
		}else{
			$pfstart = false;
		}
		return $pfstart;}

	function GetPFTermInfo($id, $taxonomy,$pflang = ''){
		$termnames = '';
		$postterms = get_the_terms( $id, $taxonomy );
		$st22srlinklt = PFSAIssetControl('st22srlinklt','','1');

		if($postterms){
			foreach($postterms as $postterm){
				if (isset($postterm->term_id)) {
					if(function_exists('icl_t')) {
						if (!empty($pflang)) {
							$term_idx = icl_object_id($postterm->term_id,$taxonomy,true,$pflang);
						}else{
							$term_idx = icl_object_id($postterm->term_id,$taxonomy,true,PF_current_language());
						}
					} else {
						$term_idx = $postterm->term_id;
					}

					$terminfo = get_term( $term_idx, $taxonomy );

					$term_link = get_term_link( $term_idx, $taxonomy );
					if (is_wp_error($term_link) === true) {$term_link = '#';}

					$term_info_name = $terminfo->name;
					if (is_wp_error($term_info_name) === true) {$term_info_name = '';}
					
					if(!empty($termnames)){$termnames .= '';}
					
					if ($st22srlinklt == 1) {
						$termnames .= '<a href="'.$term_link.'">'.$term_info_name.'</a>';
					}else{
						$termnames .= '<span class="pfdetail-ftext-nolink">'.$term_info_name.'</span>';
					}
					
				}
			}
		}
		return $termnames;
	}

	function GetPFTermInfoH($id, $taxonomy,$pflang = '',$type){
		$termnames = '';
		$postterms = wp_get_post_terms( $id, $taxonomy,array('fields' => 'all','orderby'=>'term_order','order'=>'ASC'));
		
		if($postterms){
			$postterms_count = count($postterms);
			$i = 1;
			foreach($postterms as $postterm){
				if (isset($postterm->term_id)) {
					if(function_exists('icl_t')) {
						if (!empty($pflang)) {
							$term_idx = icl_object_id($postterm->term_id,$taxonomy,true,$pflang);
						}else{
							$term_idx = icl_object_id($postterm->term_id,$taxonomy,true,PF_current_language());
						}

						$postterm = get_term( $term_idx, $taxonomy );
					}

					$term_link = get_term_link( $postterm->term_id, $taxonomy );
					$term_name = $postterm->name;

					if (is_wp_error($term_link) === true) {$term_link = '#';}					
					if (is_wp_error($term_name) === true) {$term_name = '';}
					if ($type == 2) {
						$termnames .= '<a href="'.$term_link.'">'.$term_name.'</a>';
						if ($i != $postterms_count) {
							$termnames .= ' / ';
						}
					}else{
						$termnames .= '<a href="'.$term_link.'">'.$term_name.'</a>';
					}

					$i++;
				}
			}
		}
		return $termnames;
	}


	function GetPFTermInfoWindow($id, $taxonomy,$pflang = ''){
		$termnames = '';
		$postterms = get_the_terms( $id, $taxonomy );
		$st22srlinklt = PFSAIssetControl('st22srlinklt','','1');

		if($postterms){
			foreach($postterms as $postterm){
				if (isset($postterm->term_id)) {
					if(function_exists('icl_t')) {
						if (!empty($pflang)) {
							$term_idx = icl_object_id($postterm->term_id,$taxonomy,true,$pflang);
						}else{
							$term_idx = icl_object_id($postterm->term_id,$taxonomy,true,PF_current_language());
						}
					} else {
						$term_idx = $postterm->term_id;
					}

					$terminfo = get_term( $term_idx, $taxonomy );
					
					$term_link = get_term_link( $term_idx, $taxonomy );
					if (is_wp_error($term_link) === true) {$term_link = '#';}

					
					$term_info_name = $terminfo->name;
					if (is_wp_error($term_info_name) === true) {$term_info_name = '';}
					
					if(!empty($termnames)){$termnames .= ', ';}

					
					if ($st22srlinklt == 1) {
						$termnames .= '<a href="'.$term_link.'">'.$term_info_name.'</a>';
					}else{
						$termnames .= '<span class="pfdetail-ftext-nolink">'.$term_info_name.'</span>';
					}
				}
			}
		}
		return $termnames;
	}


	function GetPFTermName($id,$taxname){
		$post_type_name = wp_get_post_terms($id, $taxname, array("fields" => "names"));
		
		if(PFControlEmptyArr($post_type_name)){
			return $post_type_name[0];
		}
	}
		
	function pointfinderhex2rgb($hex,$opacity) {
	   $hex = str_replace("#", "", $hex);

	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   
	   if($opacity !=''){
		   return 'rgba('.$r.','.$g.','.$b.','.$opacity.')';
	   }else{
		   return 'rgb('.$r.','.$g.','.$b.')';
	   }
	}

	function pointfinderhex2rgbex($hex,$opacity='1.0') {
	   $hex = str_replace("#", "", $hex);

	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   

	   return array('rgba' => 'rgba('.$r.','.$g.','.$b.','.$opacity.')','rgb'=> 'rgb('.$r.','.$g.','.$b.')');
	  
	}

	function PFcheck_postmeta_exist( $meta_key, $post_id) {
		global $wpdb;

		$meta_count = $wpdb->get_var( $wpdb->prepare("SELECT COUNT(*) FROM $wpdb->postmeta where meta_key like %s and post_id = %d",$meta_key,$post_id) );

		if ($meta_count > 0){
			return true;
		}else{
			return false;
		}
	}

	function PFIF_SortFields_sg($searchvars,$orderarg_value = ''){
		$pfstart = PFCheckStatusofVar('setup1_slides');
		$if_sorttext = '';
		
		if($pfstart == true){
			
			$available_fields = array(1,2,3,4,5,7,8,14);
			$setup1_slides = PFSAIssetControl('setup1_slides','','');	
			
			
			//Prepare detailtext
			foreach ($setup1_slides as &$value) {
				$stext = '';
				if($orderarg_value != ''){
					if(strcmp($orderarg_value,$value['url']) == 0){
						$stext = 'selected';
					}else{
						$stext = '';
					}
				}
				$Parentcheckresult = PFIF_CheckItemsParent_ld($value['url']);

				if(is_array($searchvars)){
					$res = PFIF_CheckFormVarsforExist_ld($searchvars,$Parentcheckresult);
				}else{
					$res = false;
				}

				$customfield_sortcheck = PFCFIssetControl('setupcustomfields_'.$value['url'].'_sortoption','','0');
				

				if($Parentcheckresult == 'none'){
					if(in_array($value['select'], $available_fields) && $customfield_sortcheck != 0){
						$sortnamecheck = PFCFIssetControl('setupcustomfields_'.$value['url'].'_sortname','','');

						if(empty($sortnamecheck)){
							$sortnamecheck = $value['title'];
						}
						$if_sorttext .= '<option value="'.$value['url'].'" '.$stext.'>'.$sortnamecheck.'</option>';
					}
				}else{
					if($res == true){
						$sortnamecheck = PFCFIssetControl('setupcustomfields_'.$value['url'].'_sortname','','');

						if(empty($sortnamecheck)){
							$sortnamecheck = $value['title'];
						}

						if(in_array($value['select'], $available_fields) && $customfield_sortcheck != 0){
							$if_sorttext .= '<option value="'.$value['url'].'" '.$stext.'>'.$sortnamecheck.'</option>';
						}
					}
				
				}
				
			}
			
		}
		return $if_sorttext;
	}

	/** 
	*Start: Data Validation for all fields
	**/
		function PFCleanArrayAttr($callback, $array) {

			$exclude_list = array('item_desc','item_title','webbupointfinder_item_custombox1','webbupointfinder_item_custombox2','webbupointfinder_item_custombox3');

		    foreach ($array as $key => $value) {
		        if (is_array($array[$key])) {
		        	if (!in_array($key, $exclude_list)) {
		        		$array[$key] = PFCleanArrayAttr($callback, $array[$key]);
		        	}else{
		           		$array[$key] = $array[$key];
		            } 
		        }else{
		        	if(!in_array($key, $exclude_list)){
		            	$array[$key] = call_user_func($callback, $array[$key]);
		            }else{
		           		$array[$key] = $array[$key];
		            } 
		        }
		    }
		    return $array;
		}
		
		function PFCleanFilters($arrayvalue){
			return esc_attr(sanitize_text_field($arrayvalue));
		}
	/** 
	*End: Data Validation for all fields
	**/

/**
*End:General Functions
**/



/**
*WPML Language Functions
**/
function PF_current_language(){
    global $sitepress;
    if(isset($sitepress)){
	    $current_language = $sitepress->get_current_language();
	    return $current_language;
    }
}

function PF_default_language(){
    global $sitepress;
    if(isset($sitepress)){
	    $current_language = $sitepress->get_default_language();
	    return $current_language;
    }
}

function PFLangCategoryID_ld($id,$lang){
	if(function_exists('icl_t')) {
		$setup3_pointposttype_pt1 = PFSAIssetControl('setup3_pointposttype_pt1','','pfitemfinder');
		return icl_object_id($id,$setup3_pointposttype_pt1,true,$lang);
	} else {
		return $id;
	}
}



/**
*Start:Ajax list data and static grid listing functions
**/

	function PFIFPageNumbers(){
		$output = array(3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,25,50,75);
		return $output;
	}

	function PFGetArrayValues_ld($pfvalue){
		if(!is_array($pfvalue)){
			$pfvalue_arr = array();
			if(strpos($pfvalue,',')){
				$newpfvalues = explode(',',$pfvalue);
				foreach($newpfvalues as $newpfvalue){
					array_push($pfvalue_arr,$newpfvalue);
				}
			}else{
				array_push($pfvalue_arr,$pfvalue);
			}
			return $pfvalue_arr;
		}else{
			return $pfvalue;
		}
	}

	function PFIF_DetailText_ld($id){
		
		$setup22_searchresults_hide_lt  = PFSAIssetControl('setup22_searchresults_hide_lt','','0');

		$pfstart = PFCheckStatusofVar('setup1_slides');
		$output_text = array();
		if($pfstart == true){
			$if_detailtext = '';
			
			$PF_CF_Val = new PF_CF_Val($id);
			$setup1_slides = PFSAIssetControl('setup1_slides','','');
			if(is_array($setup1_slides)){	
				foreach ($setup1_slides as &$value) {
					
					$customfield_infocheck = PFCFIssetControl('setupcustomfields_'.$value['url'].'_linfowindow','','0');
					$available_fields = array(1,2,3,4,5,7,8,14,15);
					
					if(in_array($value['select'], $available_fields) && $customfield_infocheck != 0){
						$ClassReturnVal = $PF_CF_Val->GetValue($value['url'],$id,$value['select'],$value['title'],1);
						
						if($ClassReturnVal != ''){
							if(strpos($ClassReturnVal,"pf-price") != false){
								$output_text['priceval'] = $ClassReturnVal;
							}else{
								$if_detailtext .= $ClassReturnVal;
								
							}

						}
					}
					
				}
			}

			$output_text['content'] = $if_detailtext;

			if($setup22_searchresults_hide_lt == 0){
				$pfitemtext = '';
				
				
				if($pfitemtext != ''){
					$output_text['ltypes']= '<div class="pflistingitem-subelement pf-ltitem"><span class="pf-ftitle">'.$pfitemtext.'</span>
					<span class="pf-ftext">'.GetPFTermInfo($id,'pointfinderltypes').'</span></div>';
				}else{
					$term_names = get_the_term_list( $id, 'pointfinderltypes', '<ul class="pointfinderpflisttermsgr"><li>', ',</li><li>', '</li></ul>' );

					$output_text['ltypes']= '<div class="pflistingitem-subelement pf-price">';
					$output_text['ltypes'] .= '';
						if (strpos($term_names, ',') != 0) {
							$term_names = explode(',', $term_names);
						}
						
						if (count($term_names) > 1) {
							$output_text['ltypes'] .= $term_names[0];
						}else{
							$output_text['ltypes'] .= $term_names;
						}
						
					$output_text['ltypes'] .= '';
					$output_text['ltypes'] .= '</div>';
				}
			}
		}
		unset($PF_CF_Val);
			

		return $output_text;
	}

	function PFIF_CheckItemsParent_ld($slug){
		$RelationFieldName = 'setupcustomfields_'.$slug.'_parent';
		$ParentItem = PFCFIssetControl($RelationFieldName,'','');
		
		//If it have a parent element
		if($ParentItem != '' && $ParentItem != '0'){return $ParentItem;}else{return 'none';}
	}

	function PFIF_CheckFieldisNumeric_ld($pfg_orderby){
		$setup1_slides = PFSAIssetControl('setup1_slides','','');	
		$text = false;
		foreach ($setup1_slides as &$value) {
			if($value['select'] == 4 && strcmp($value['url'], $pfg_orderby) == 0){
				$text = true;
			}
		}
		return $text;
	}

	function PFIF_CheckFormVarsforExist_ld($searchvars,$itemvar = array()){
		if($itemvar != 'none' && count($itemvar)>0){
			foreach($searchvars as $searchvar){
				if(in_array($searchvar,$itemvar)){return true;}
			}
		}
	}

	function PFFindKeysInSearchFieldA_ld($pfformvar){
		$setup1s_slides = PFSAIssetControl('setup1s_slides','','');
		//Find Key in array of search fields
		foreach($setup1s_slides as $setup1s_slide){
			if($setup1s_slide['url'] == $pfformvar){
				return $setup1s_slide['select'];
				break;
			}
			
		};
	}

	/*Item grid static & ajax*/
	function PFEX_extract_type_ig($pfarray){
		$output = '';
		if(is_array($pfarray)){
		foreach ($pfarray as $value) {
			if ($output != '') {
				$output .= ',';
			} 
			$output .= $value;
		}
		return $output;
		}else{return $pfarray;}
	}

	function PF_generate_random_string_ig($name_length = 12) {
		$alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		return substr(str_shuffle($alpha_numeric), 0, $name_length);
	}

/**
*End:Ajax list data and static grid listing functions
**/



/**
*Start:reCaptcha Functions
**/
	function PFreCaptchaWidget(){
		$wpf_rndnum = rand(10,1000);
		$publickey = PFRECIssetControl('setupreCaptcha_general_pubkey','','');
		$lang = PFRECIssetControl('setupreCaptcha_general_lang','','en');
		return '<script type="text/javascript">var PFFonloadCallback = function() {jQuery.widgetId'.$wpf_rndnum.' = grecaptcha.render("g-recaptcha-'.$wpf_rndnum.'", {"sitekey" : "'.$publickey.'"});};</script><div id="g-recaptcha-'.$wpf_rndnum.'" class="g-recaptcha-field" data-rekey="widgetId'.$wpf_rndnum.'"></div><script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl='.$lang.'&onload=PFFonloadCallback&render=explicit" async defer></script>';
	}


	function PFCGreCaptcha($recaptcha_response_field = ''){
			
			$privatekey = PFRECIssetControl('setupreCaptcha_general_prikey','','');

			$resp = null;
			$error = null;

			$statusofjob = null;


			$reCaptcha = new ReCaptcha($privatekey);

			
			if (!empty($recaptcha_response_field)) {
			    $resp = $reCaptcha->verifyResponse(
			        $_SERVER["REMOTE_ADDR"],
			        $recaptcha_response_field
			    );
			}

			if ($resp != null && $resp->success) {
				$statusofjob = 1;
			}else {
		        $statusofjob = 0;
		    }

			return $statusofjob;
			

	}
/**
*End:reCaptcha Functions
**/




/**
*Start:Page Functions
**/
	function PFGetHeaderBar($post_id='', $post_title=''){
	    
	    if($post_id == ''){
	        $post_id = get_the_ID(); 
	    }

	    $_page_titlebararea = redux_post_meta("pointfinderthemefmb_options", $post_id, "webbupointfinder_page_titlebararea");

	    if($_page_titlebararea == 1){
	    	
	    	$_page_defaultheaderbararea = redux_post_meta("pointfinderthemefmb_options", $post_id, "webbupointfinder_page_defaultheaderbararea");
	    	
	    	if ($_page_defaultheaderbararea == 1) {
	    		if(function_exists('PFGetDefaultPageHeader')){
					PFGetDefaultPageHeader(array('pagename' => get_the_title()));
					return;
				}

	    	}

	    	$_page_titlebarareatext = redux_post_meta("pointfinderthemefmb_options", $post_id, "webbupointfinder_page_titlebarareatext");
	    	$_page_titlebarcustomtext_color = redux_post_meta( "pointfinderthemefmb_options", $post_id, "webbupointfinder_page_titlebarcustomtext_color" );
	    	$_page_titlebarcustomtext = redux_post_meta("pointfinderthemefmb_options", $post_id, "webbupointfinder_page_titlebarcustomtext");
	        $_page_titlebarcustomsubtext = redux_post_meta("pointfinderthemefmb_options", $post_id, "webbupointfinder_page_titlebarcustomsubtext");
	        $_page_titlebarcustomheight = redux_post_meta("pointfinderthemefmb_options", $post_id, "webbupointfinder_page_titlebarcustomheight");
	        $_page_titlebarcustombg = redux_post_meta("pointfinderthemefmb_options", $post_id, "webbupointfinder_page_titlebarcustombg");
	        $_page_titlebarcustomtext_bgcolor = redux_post_meta("pointfinderthemefmb_options", $post_id, "webbupointfinder_page_titlebarcustomtext_bgcolor");
	        $_page_titlebarcustomtext_bgcolorop = redux_post_meta("pointfinderthemefmb_options", $post_id, "webbupointfinder_page_titlebarcustomtext_bgcolorop");
	        $setup43_themecustomizer_headerbar_shadowopt = redux_post_meta("pointfinderthemefmb_options", $post_id, "webbupointfinder_page_shadowopt");
	       
	        if (PFControlEmptyArr($_page_titlebarcustombg)) {
	        	$_page_titlebarcustombg_repeat = $_page_titlebarcustombg['background-repeat'];
		        $_page_titlebarcustombg_color = $_page_titlebarcustombg['background-color'];
		        $_page_titlebarcustombg_fixed = $_page_titlebarcustombg['background-attachment'];
		        $_page_titlebarcustombg_image = $_page_titlebarcustombg['background-image'];
	        }else{
	        	$_page_titlebarcustombg_repeat = '';
		        $_page_titlebarcustombg_color = '';
		        $_page_titlebarcustombg_fixed = '';
		        $_page_titlebarcustombg_image = '';
	        }


	        $_page_custom_css = $_text_custom_css = ' style="';

	        if ($_page_titlebarcustomheight != '') {
	            $_page_custom_css .= 'height:'.$_page_titlebarcustomheight.'px;';
	        } 

	        if ($_page_titlebarcustombg_image != '') {
	            $_page_custom_css .= 'background-image:url('.$_page_titlebarcustombg_image.');';
	        } 
	        if ($_page_titlebarcustombg_repeat != '') {
	            $_page_custom_css .= 'background-repeat: '.$_page_titlebarcustombg_repeat.';';
	        }
	        if ($_page_titlebarcustombg_color != '') {
	            $_page_custom_css .= 'background-color:'.$_page_titlebarcustombg_color.';';
	        } 
	        if ($_page_titlebarcustombg_fixed != '') {
	            $_page_custom_css .= 'background-attachment :'.$_page_titlebarcustombg_fixed.';';
	        }  
	        if ($_page_titlebarcustomtext_color != '') {
	            $_page_custom_css .= 'color:'.$_page_titlebarcustomtext_color.';';
	            $_text_custom_css .= 'color:'.$_page_titlebarcustomtext_color.';';

	        } 

	        if ($_page_titlebarcustomtext_bgcolor != '') {
	        	$color_output = pointfinderhex2rgbex($_page_titlebarcustomtext_bgcolor,$_page_titlebarcustomtext_bgcolorop);
	        	$_text_custom_css .= 'background-color: '.$color_output['rgb'].';background-color: '.$color_output['rgba'].'; ';
	        	$_text_custom_css_main = ' pfwbg';
	    		$_text_custom_css_sub = ' pfwbg';
	        }else{
	        	$_text_custom_css_main = '';
	        	$_text_custom_css_sub = '';
	        }

	        $_page_custom_css .= '';
	        $_text_custom_css .= '"';

	        
	        
	        $pagetitletext = '<div class="main-titlebar-text'.$_text_custom_css_main.'"'.$_text_custom_css.'>';

	        if($_page_titlebarareatext == 1){

	            if ($_page_titlebarcustomtext != '') {
	                $pagetitletext .= $_page_titlebarcustomtext;
	            }else{
	            	$pagetitletext .= get_the_title();
	            }
	            

	            if ($_page_titlebarcustomsubtext != '') {
	                $pagesubtext = '<div class="sub-titlebar-text'.$_text_custom_css_sub.'"'.$_text_custom_css.'>'.$_page_titlebarcustomsubtext.'</div>';
	            }else{
	            	$pagesubtext = '';
	            }
	        }else{
	        	$pagetitletext .= get_the_title();
	        	$pagesubtext = '';
	        }

	        if($post_title != ''){$pagetitletext .= ' / '.$post_title;}
	        $pagetitletext .= '</div>';
	        
	        
        	echo '
        	<section role="pageheader"'.$_page_custom_css.'" class="pf-page-header">
        	';
        	if ($setup43_themecustomizer_headerbar_shadowopt != 0) {
				echo '<div class="pfheaderbarshadow'.$setup43_themecustomizer_headerbar_shadowopt.'"></div>';
			}
        	echo '
        		<div class="pf-container">
        			<div class="pf-row">
        				<div class="col-lg-12">
        					<div class="pf-titlebar-texts">'.$pagetitletext.$pagesubtext.'</div>
        					<div class="pf-breadcrumbs clearfix">'.pf_the_breadcrumb(
        						array(
							        '_text_custom_css' => $_text_custom_css,
							        '_text_custom_css_main' => $_text_custom_css_main
									)
        						).'</div>
        				</div>
        			</div>
        		</div>
        	</section>';
  
	    }
	}

	function PFGetDefaultPageHeader($params = array()){

		$defaults = array( 
	        'author_id' => '',
	        'agent_id' => '',
	        'taxname' => '',
	        'taxnamebr' => '',
	        'taxinfo' => '',
	        'itemname' => '',
	        'itemaddress' => '',
	        'pagename' => ''
	    );

		$params = array_merge($defaults, $params);

		$setup43_themecustomizer_titlebarcustomtext_bgcolor = PFSAIssetControl('setup43_themecustomizer_titlebarcustomtext_bgcolor','','');
		$setup43_themecustomizer_titlebarcustomtext_bgcolorop = PFSAIssetControl('setup43_themecustomizer_titlebarcustomtext_bgcolorop','','');

		$setup43_themecustomizer_headerbar_shadowopt = PFSAIssetControl('setup43_themecustomizer_headerbar_shadowopt','',0);

	 	$_text_custom_css =' style="';

	    if ($setup43_themecustomizer_titlebarcustomtext_bgcolor != '') {
	    	$color_output = pointfinderhex2rgbex($setup43_themecustomizer_titlebarcustomtext_bgcolor,$setup43_themecustomizer_titlebarcustomtext_bgcolorop);
	    	$_text_custom_css .= 'background-color: '.$color_output['rgb'].';background-color: '.$color_output['rgba'].'; ';
	    	$_text_custom_css_main = ' pfwbg';
	    	$_text_custom_css_sub = ' pfwbg';
	    }else{
	    	$_text_custom_css_main = '';
	    	$_text_custom_css_sub = '';
	    }

	    $_text_custom_css .= '"';

	    $titletext = '';
	    if(empty($params['taxname'])){
		    if (is_author()) {
		    	$user = get_user_by('id', $params['author_id']);
		    	$titletext = $user->nickname;
		    }elseif(is_search()){
		    	if (!empty($_GET['s'])) {
		    		$titletext = sprintf(esc_html__( 'Search Results for %s', 'pointfindert2d' ),$_GET['s']);
		    	}else{
		    		$titletext = esc_html__( 'Search Results', 'pointfindert2d' );
		    	}
		    	
			}elseif(is_category()){
				$categ = get_category_by_path("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",false);
				
				if (empty($categ)) {
					$categ = esc_sql(get_query_var('cat'));
					$titletext = get_cat_name( $categ );
				}else{
					if (isset($categ)) {
						$titletext = $categ->name;
					}
				}
				
				
			}elseif (is_tag()) {
				$titletext = single_tag_title('',false);
			}else{
		    	$titletext = get_the_title();
		    }
		}else{
			$titletext = $params['taxname'];
			$titlesubtext = $params['taxinfo'];
		}

		if (function_exists('is_woocommerce')) {
	    	if (is_woocommerce()) {
	    		ob_start();
	    		woocommerce_page_title();
	    		$titletext = ob_get_contents();
	    		ob_end_clean();
	    	}
	    }

		if(empty($params['itemname'])){

			/* If page is member dashboard. */
		    $setup4_membersettings_dashboard = PFSAIssetControl('setup4_membersettings_dashboard','','');
		    if (get_the_id() == $setup4_membersettings_dashboard) {
		    	
		    	if(isset($_GET['ua']) && $_GET['ua']!=''){
					$ua_action = esc_attr($_GET['ua']);
				}else{
					$ua_action = '';
				}

		    	switch ($ua_action) {
					case 'profile':
						$titletext = PFSAIssetControl('setup29_dashboard_contents_profile_page_title','','Profile');
					break;
					case 'favorites':
						$titletext = PFSAIssetControl('setup29_dashboard_contents_favs_page_title','','My Favorites');
					break;
					case 'newitem':
						$titletext = PFSAIssetControl('setup29_dashboard_contents_submit_page_title','','Submit New Item');
					break;
					case 'edititem':
						$titletext = PFSAIssetControl('setup29_dashboard_contents_submit_page_titlee','','Edit Item');
					break;
					case 'reviews':
						$titletext = PFSAIssetControl('setup29_dashboard_contents_rev_page_title','','My Reviews');
					break;
					case 'myitems':
						$titletext = PFSAIssetControl('setup29_dashboard_contents_my_page_title','','My Items');
					break;
					case 'renewplan':
						$titletext = esc_html__("Renew Current Plan","pointfindert2d" );
					break;
					case 'purchaseplan':
						$titletext = esc_html__("Purchase New Plan","pointfindert2d");
					break;
					case 'upgradeplan':
						$titletext = esc_html__("Upgrade Plan","pointfindert2d" );
					break;
					case 'invoices':
						$titletext = PFSAIssetControl('setup29_dashboard_contents_inv_page_title','','My Invoices');
					break;
					default:
						$titletext = esc_html__('Not Found!','pointfindert2d');
					break;

				}

				

				$titletext = get_the_title().' / '.$titletext;
		    }

			echo '
			<section role="pageheader" class="pf-defaultpage-header">';
				if ($setup43_themecustomizer_headerbar_shadowopt != 0) {
					echo '<div class="pfheaderbarshadow'.$setup43_themecustomizer_headerbar_shadowopt.'"></div>';
				}
			echo '
				<div class="pf-container">
					<div class="pf-row">
						<div class="col-lg-12">';
						
						
						echo '
							<div class="pf-titlebar-texts">
							<h1 class="main-titlebar-text'.$_text_custom_css_main.'"'.$_text_custom_css.'>'.$titletext.'</h1>
							';
							if (!empty($titlesubtext)) {
								echo '<div class="sub-titlebar-text'.$_text_custom_css_sub.'"'.$_text_custom_css.'>'.$titlesubtext.'</div>';
							}
							echo '
							</div>
							';

							if(empty($params['taxname'])){
								echo '<div class="pf-breadcrumbs clearfix'.$_text_custom_css_sub.'"'.$_text_custom_css.'>'.pf_the_breadcrumb(array('_text_custom_css' => $_text_custom_css,'_text_custom_css_main' => $_text_custom_css_main)).'</div>';
							}else{
								echo '<div class="pf-breadcrumbs clearfix'.$_text_custom_css_sub.'"'.$_text_custom_css.'>'.pf_the_breadcrumb(array('taxname'=>$params['taxnamebr'],'_text_custom_css' => $_text_custom_css,'_text_custom_css_main' => $_text_custom_css_main)).'</div>';
							}
							
							echo '
						</div>
					</div>
				</div>
			</section>';
		}else{
			$setup42_itempagedetails_hideaddress = PFSAIssetControl('setup42_itempagedetails_hideaddress','','1');
			echo '
			<section role="itempageheader" class="pf-itempage-header">';
				if ($setup43_themecustomizer_headerbar_shadowopt != 0) {
					echo '<div class="pfheaderbarshadow'.$setup43_themecustomizer_headerbar_shadowopt.'"></div>';
				}
			echo '
				<div class="pf-container">
					<div class="pf-row">
						<div class="col-lg-12">
							<div class="pf-titlebar-texts">
								<div class="main-titlebar-text'.$_text_custom_css_main.'"'.$_text_custom_css.'>'.$params['itemname'].'</div>
								';
								if($setup42_itempagedetails_hideaddress == 1){
								echo '<div class="sub-titlebar-text'.$_text_custom_css_sub.'"'.$_text_custom_css.'>'.$params['itemaddress'].'</div>';
								}
								echo '						
							</div>
							<div class="pf-breadcrumbs clearfix hidden-print'.$_text_custom_css_sub.'"'.$_text_custom_css.'>'.pf_the_breadcrumb(array('_text_custom_css' => $_text_custom_css,'_text_custom_css_main' => $_text_custom_css_main)).'</div>
						</div>
					</div>
				</div>
			</section>';
		}
	}

	function PFGetDefaultCatPageHeader($params = array()){

		$defaults = array( 
	        'taxname' => '',
	        'taxnamebr' => '',
	        'taxinfo' => '',
	        'pf_cat_textcolor' => '',
			'pf_cat_backcolor' => '',
			'pf_cat_bgimg' => '',
			'pf_cat_bgrepeat' => '',
			'pf_cat_bgsize' => '',
			'pf_cat_bgpos' => '',
			'pf_cat_headerheight' => '',
			'pf_cat_bgattachment' => 'scroll'
	    );

		$params = array_merge($defaults, $params);

		$setup43_themecustomizer_headerbar_shadowopt = PFSAIssetControl('setup43_themecustomizer_headerbar_shadowopt','',0);

	 	$_text_custom_css = $_text_custom_css1 = ' style="';

	    if ($params['pf_cat_backcolor'] != '') {
	    	$color_output = pointfinderhex2rgbex($params['pf_cat_backcolor'],'0.7');
	    	$_text_custom_css .= 'background-color: '.$params['pf_cat_backcolor'].'; background-color:'.$color_output['rgba'].'; ';
	    	$_text_custom_css1 .= 'background-color: '.$params['pf_cat_backcolor'].'; background-color:'.$color_output['rgba'].';';
	    	$_text_custom_css_main = ' pfwbg';
	    	$_text_custom_css_sub = ' pfwbg';
	    }else{
	    	$_text_custom_css_main = '';
	    	$_text_custom_css_sub = '';
	    }

	    if (isset($params['pf_cat_bgimg'][0])) {
	    	$bgimage_defined = wp_get_attachment_url($params['pf_cat_bgimg'][0]);

	    	$_text_custom_css .= 'background: url('.$bgimage_defined.');';
	    	$_text_custom_css .= 'background-position: '.$params['pf_cat_bgpos'].';';
	    	$_text_custom_css .= 'background-size: '.$params['pf_cat_bgsize'].';';
	    	$_text_custom_css .= 'background-repeat: '.$params['pf_cat_bgrepeat'].';';
	    	$_text_custom_css .= 'background-attachment: '.$params['pf_cat_bgattachment'].';';
	    	$_text_custom_css .= 'height: '.$params['pf_cat_headerheight'].'px;';
	    	$_text_custom_css .= 'color: '.$params['pf_cat_textcolor'].';';
	    }

	    $_text_custom_css .= '"';
	    $_text_custom_css1 .= '"';


	    $titletext = '';
	    if(empty($params['taxname'])){
		    if(is_category() || is_archive()){
				$categ = get_category_by_path("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",false);
				
				if (empty($categ)) {
					$categ = esc_sql(get_query_var('cat'));
					$titletext = get_cat_name( $categ );
				}else{
					if (isset($categ)) {
						$titletext = $categ->name;
					}
				}
			}elseif (is_tag()) {
				$titletext = single_tag_title('',false);
			}else{
		    	$titletext = get_the_title();
		    }
		}else{
			$titletext = $params['taxname'];
			$titlesubtext = $params['taxinfo'];
		}


		
		echo '
		<section role="pageheader" class="pf-defaultpage-header"'.$_text_custom_css.'>';
			if ($setup43_themecustomizer_headerbar_shadowopt != 0) {
				echo '<div class="pfheaderbarshadow'.$setup43_themecustomizer_headerbar_shadowopt.'"></div>';
			}
		echo '
			<div class="pf-container" style="height:100%">
				<div class="pf-row" style="height:100%">
					<div class="col-lg-12" style="height:100%">';
					
					
					echo '
						<div class="pf-titlebar-texts">
						<h1 class="main-titlebar-text'.$_text_custom_css_main.'"'.$_text_custom_css1.'>'.$titletext.'</h1>
						';
						if (!empty($titlesubtext)) {
							echo '<div class="sub-titlebar-text'.$_text_custom_css_sub.'"'.$_text_custom_css1.'>'.$titlesubtext.'</div>';
						}
						echo '
						</div>
						';

						if(empty($params['taxname'])){
							echo '<div class="pf-breadcrumbs clearfix'.$_text_custom_css_sub.'"'.$_text_custom_css1.'>'.pf_the_breadcrumb(array('_text_custom_css' => $_text_custom_css1,'_text_custom_css_main' => $_text_custom_css_main)).'</div>';
						}else{
							echo '<div class="pf-breadcrumbs clearfix'.$_text_custom_css_sub.'"'.$_text_custom_css1.'>'.pf_the_breadcrumb(array('taxname'=>$params['taxnamebr'],'_text_custom_css' => $_text_custom_css1,'_text_custom_css_main' => $_text_custom_css_main)).'</div>';
						}
						
						echo '
					</div>
				</div>
			</div>
		</section>';
	
	}

	function PFPageNotFound(){
	  ?>
		<section role="main">
	        <div class="pf-container">
	            <div class="pf-row">
	                <div class="col-lg-12">
	                 
	                    <form method="get" class="form-search" action="<?php echo esc_url(home_url()); ?>" data-ajax="false">
	                    <div class="pf-notfound-page animated flipInY">
	                        <h3><?php esc_html_e( 'Sorry!', 'pointfindert2d' ); ?></h3>
	                        <h4><?php esc_html_e( 'Nothing found...', 'pointfindert2d' ); ?></h4><br>
	                        <p class="text-lightblue-2"><?php esc_html_e( 'You better try to search', 'pointfindert2d' ); ?>:</p>
	                        <div class="row">
	                            <div class="pfadmdad input-group col-sm-4 col-sm-offset-4">
	                                <i class="pfadmicon-glyph-386"></i>
	                                <input type="text" name="s" class="form-control" onclick="this.value='';"  onfocus="if(this.value==''){this.value=''};" onblur="if(this.value==''){this.value=''};" value="<?php esc_html_e( 'Search', 'pointfindert2d' ); ?>">
	                                <span class="input-group-btn">
	                                    <button onc class="btn btn-success" type="submit"><?php esc_html_e( 'Search', 'pointfindert2d' ); ?></button>
	                                  </span>
	                            </div>
	                        </div><br>
	                        <a class="btn btn-primary btn-sm" href="<?php echo esc_url(home_url()); ?>"><i class="pfadmicon-glyph-857"></i><?php esc_html_e( 'Return Home', 'pointfindert2d' ); ?></a>
	                    </div>
	                    </form>
	                
	                </div>
	            </div>
	        </div>
	    </section>
	  <?php
	}

	function PFLoginWidget(){
	  ?>
		<section role="main">
	        <div class="pf-container">
	            <div class="pf-row">
	                <div class="col-lg-12">
	                 
	                    <div class="pf-notlogin-page animated flipInY">
	                        <h3><?php esc_html_e( 'Sorry!', 'pointfindert2d' ); ?></h3>
	                        <h4><?php esc_html_e( 'You must login to see this page.', 'pointfindert2d' ); ?></h4><br>
	                    </div>
	                    <script>
				       (function($) {
			  			"use strict";
				       	$(function(){
				       		$.pfOpenLogin('open','login');
				       	})
				       })(jQuery);
				       </script>
	                
	                </div>
	            </div>
	        </div>
	    </section>
	  <?php
	}
/**
*End:Page Functions
**/





/**
*Start: Breadcrumbs
**/
	function pf_the_breadcrumb($params = array()) {

		$defaults = array( 
	        'taxname' => '',
	        '_text_custom_css' => '',
	        '_text_custom_css_main' => ''
	    );

		$params = array_merge($defaults, $params);

		$_text_custom_css_main = (!empty($params['_text_custom_css_main']))?$params['_text_custom_css_main']:'';
		$_text_custom_css = (!empty($params['_text_custom_css']))?$params['_text_custom_css']:'';



		$mpost_id = get_the_id();

		$setup3_modulessetup_breadcrumbs = PFSAIssetControl('setup3_modulessetup_breadcrumbs','','1');
		if ($setup3_modulessetup_breadcrumbs == 1) {
			
			$act_ok = 1;
			if (function_exists('is_bbpress')) {
				if(!is_bbpress()){ $act_ok = 1;}else{$act_ok = 0;}
			}
			if($act_ok == 1){
				$output = '';
		        $output .= '<ul id="pfcrumbs" class="'.trim($_text_custom_css_main).'"'.trim($_text_custom_css).'>';

		        if (!is_home()) {
		                $output .= '<li><a href="';
		                $output .= esc_url(home_url());
		                $output .= '">';
		                $output .= esc_html__('Home','pointfindert2d');
		                $output .= "</a></li>";
		                if (is_category() || is_single()) {
		                 

		                        $post_type = get_post_type();
								$setup3_pointposttype_pt1 = PFSAIssetControl('setup3_pointposttype_pt1','','pfitemfinder');

								switch ($post_type) {
									case $setup3_pointposttype_pt1:
										$categories = get_the_terms($mpost_id,'pointfinderltypes');
										$output2 = '';
								
										if($categories){
											$cat_count = count($categories);

											foreach($categories as $category) {
												if (!empty($category->parent)) {
													$term_parent_name = get_term_by('id', $category->parent, 'pointfinderltypes','ARRAY_A');
													$get_termname = $term_parent_name['name'].' / '.$category->name;
													$output2 .= '<li>';
													$output2 .= '<a href="'.get_term_link( $category->parent, 'pointfinderltypes' ).'" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s","pointfindert2d" ), $term_parent_name['name']) ) . '">'.$term_parent_name['name'].'</a>';
													$output2 .= '</li>';
												}

												$output2 .= '<li>';
												$output2 .= '<a href="'.get_term_link( $category->term_id,'pointfinderltypes' ).'" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s","pointfindert2d" ), $category->name ) ) . '">'.$category->name.'</a>';
												$output2 .= '</li>';
											}
										$output .= trim($output2);
										}
										break;

									case 'post':

										$list_cats = get_category_by_path("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",false);
										$ci = 0;
										if (isset($list_cats)) {
											$output .= '<li>'.$list_cats->name.'</li>';
										}
										
										break;
									default:
										$list_cats = get_the_category();
										$ci = 0;
										foreach ($list_cats as $list_cat) {
											if($ci < 2){
												$output .= '<li>'.$list_cat->name.'</li>';
											}
											$ci++;
										}

								}


		                       

		                        if (is_single()) {
		                                $output .= "<li>";
		                                $output .= '<a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
		                                $output .= '</li>';
		                        }
		                } elseif (is_page()) {
		                		
								$parents = get_post_ancestors($mpost_id);
								$parents = array_reverse($parents);
								if (!empty($parents)) {
									foreach ($parents as $key => $value) {
										$output .= '<li>';
		                        		$output .= '<a href="'.get_permalink($value).'" title="'.get_the_title($value).'">'.get_the_title($value).'</a>';
		                        		$output .= '</li>';
									}
								}
						  
		                        $output .= '<li>';
		                        $output .= '<a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
		                        $output .= '</li>';
		                } elseif (is_tax()) {
		                	$output .= "<li>";
                            $output .= $params['taxname'];
                            $output .= '</li>';
		                }elseif (is_tag()) {
		                	$output .= "<li>";
		                	$output .= single_tag_title('',false);
		                	$output .= '</li>';
		                }

		        
		        }elseif (is_day()) {$output .="<li>".esc_html__('Archive for','pointfindert2d')." "; get_the_time('F jS, Y'); $output .='</li>';
		        }elseif (is_month()) {$output .="<li>".esc_html__('Archive for','pointfindert2d')." "; get_the_time('F, Y'); $output .='</li>';
		        }elseif (is_year()) {$output .="<li>".esc_html__('Archive for','pointfindert2d')." "; get_the_time('Y'); $output .='</li>';
		        }elseif (is_author()) {$output .="<li>".esc_html__('Author Archive','pointfindert2d').""; $output .='</li>';
		        }elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {$output .= "<li>".esc_html__('Blog Archives','pointfindert2d').""; $output .='</li>';
		        }elseif (is_search()) {$output .="<li>".esc_html__('Search Results','pointfindert2d').""; $output .='</li>';}
		        $output .= '</ul>';

		        return $output;
		    }
		}
	}
/**
*End: Breadcrumbs
**/

function pf_get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    $k = 0;
    // climb up the hierarchy until we reach a term with parent = '0'
    if (!empty($parent)) {
	    while ($parent->parent != '0'){
	        $term_id = $parent->parent;

	        $parent  = get_term_by( 'id', $term_id, $taxonomy);
	        $k++;
	    } 
	}

    return array('parent'=>$parent->term_id, 'level'=>$k);
}

function pf_get_term_top_parent($term_id, $taxonomy){
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    return $parent->parent;
}


function pointfinder_get_vc_version(){
	$vc_version_current = 0;
	if(function_exists('vc_set_as_theme')){
		if ( ! function_exists( 'get_plugins' ) ){
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		$plugin_folder = get_plugins( '/');
		$plugin_file = 'js_composer/js_composer.php';
		if (isset($plugin_folder[$plugin_file]['Version'])) {
			$vc_version_current = $plugin_folder[$plugin_file]['Version'];
		}
	}
	return $vc_version_current;
}

function pf_theme_render_title() {
    ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php
}


function pf_get_condition_color($value){
	$retunarr = array();
	if (!empty($value)) {
		$pointfindercondition_vars = get_option('pointfindercondition_vars');
		if (isset($pointfindercondition_vars[$value]['pf_condition_bg'])) {
			$retunarr['bg'] = $pointfindercondition_vars[$value]['pf_condition_bg'];
		}
		if (isset($pointfindercondition_vars[$value]['pf_condition_text'])) {
			$retunarr['cl'] = $pointfindercondition_vars[$value]['pf_condition_text'];
		}
	}
	return $retunarr;
}


function pointfinder_price_output_set($value){

	trigger_error(esc_html__("Deprecated function called.","pointfindert2d"), E_USER_NOTICE);
	
	/* this function moved to pointfinder_reformat_pricevalue_for_frontend();
	if (!empty($value)) {
		$setup20_paypalsettings_paypal_price_short = PFSAIssetControl('setup20_paypalsettings_paypal_price_short','','$');
		$setup20_paypalsettings_paypal_price_pref = PFSAIssetControl('setup20_paypalsettings_paypal_price_pref','',1);

		if ($setup20_paypalsettings_paypal_price_pref == 1) {
			return $setup20_paypalsettings_paypal_price_short.' '.$value;
		}else{
			return $value.' '.$setup20_paypalsettings_paypal_price_short;
		}

	}*/
}

/*
* Added with v1.7.2 for check relation between listing type and ta taxonomies.
*/
function pointfinder_features_tax_output_check($term_parent,$listting_id,$taxonomy){

	$output_check = '';
	$controlvalue = 0;
	
	switch ($taxonomy) {
		case 'pointfinderfeatures':
			$controlvalue = PFSAIssetControl('setup4_sbf_c1','','1');
			break;
	}


	if (!empty($term_parent) && !empty($listting_id)) {
		if (is_array($term_parent)) {
			if (in_array($listting_id, $term_parent)) {$output_check = 'ok';}else{$output_check = 'not';}
		}else{
			if ($listting_id == $term_parent) {$output_check = 'ok';}else{$output_check = 'not';}
		}
	}elseif (empty($term_parent) && empty($listting_id)) {
		$output_check = 'ok';
	}elseif (empty($term_parent) && !empty($listting_id)) {
		if ($controlvalue == 1) {$output_check = 'ok';}else{$output_check = 'not';}
	}elseif (!empty($term_parent) && empty($listting_id)) {
		$output_check = 'not';
	}
	return $output_check;
}


/*
* Added with v1.7.2 moved from new-features-pt.php
*/
function pointfinder_taxonomy_connection_field_creator($selected_value){

	echo '<tr class="form-field"><th scope="row" valign="top"></th><td>';
    echo '<section>';  


    
    $listdefault = (isset($selected_value))?$selected_value:'';
    $output_options = $output = "";
       
    $fieldvalues = get_terms('pointfinderltypes',array('hide_empty'=>false)); 
    	
    foreach( $fieldvalues as $parentfieldvalue){
        
        if($parentfieldvalue->parent == 0){

        	$fieldtaxSelectedValueParent = 0;

        	if(!empty($listdefault)){
	            if(is_array($listdefault)){
	                if(in_array($parentfieldvalue->term_id, $listdefault)){ $fieldtaxSelectedValueParent = 1;}
	            }else{
	                if(strcmp($listdefault,$parentfieldvalue->term_id) == 0){ $fieldtaxSelectedValueParent = 1;}
	            }
	        }

	        if($fieldtaxSelectedValueParent == 1){
	            $output_options .= '<option value="'.$parentfieldvalue->term_id.'" selected class="pftitlebold">&nbsp;'.$parentfieldvalue->name.'</option>';
	        }else{
	            $output_options .= '<option value="'.$parentfieldvalue->term_id.'" class="pftitlebold">&nbsp;'.$parentfieldvalue->name.'</option>';
	        }

	        foreach( $fieldvalues as $firstchild_fieldvalue){
				if($firstchild_fieldvalue->parent == $parentfieldvalue->term_id){
					$fieldtaxSelectedValueFC = 0;

		        	if(!empty($listdefault)){
			            if(is_array($listdefault)){
			                if(in_array($firstchild_fieldvalue->term_id, $listdefault)){ $fieldtaxSelectedValueFC = 1;}
			            }else{
			                if(strcmp($listdefault,$firstchild_fieldvalue->term_id) == 0){ $fieldtaxSelectedValueFC = 1;}
			            }
			        }

			        if($fieldtaxSelectedValueFC == 1){
			            $output_options .= '<option value="'.$firstchild_fieldvalue->term_id.'" selected>&nbsp;&nbsp;-&nbsp;'.$firstchild_fieldvalue->name.'</option>';
			        }else{
			            $output_options .= '<option value="'.$firstchild_fieldvalue->term_id.'">&nbsp;&nbsp;-&nbsp;'.$firstchild_fieldvalue->name.'</option>';
			        }

			        foreach( $fieldvalues as $secondchild_fieldvalue){
						if($secondchild_fieldvalue->parent == $firstchild_fieldvalue->term_id){
							$fieldtaxSelectedValueSC = 0;

				        	if(!empty($listdefault)){
					            if(is_array($listdefault)){
					                if(in_array($secondchild_fieldvalue->term_id, $listdefault)){ $fieldtaxSelectedValueSC = 1;}
					            }else{
					                if(strcmp($listdefault,$secondchild_fieldvalue->term_id) == 0){ $fieldtaxSelectedValueSC = 1;}
					            }
					        }

					        if($fieldtaxSelectedValueSC == 1){
					            $output_options .= '<option value="'.$secondchild_fieldvalue->term_id.'" selected>&nbsp;&nbsp;--&nbsp;'.$secondchild_fieldvalue->name.'</option>';
					        }else{
					            $output_options .= '<option value="'.$secondchild_fieldvalue->term_id.'">&nbsp;&nbsp;--&nbsp;'.$secondchild_fieldvalue->name.'</option>';
					        }
						}
					}
				}
			}
        }     
    }
    
    echo '<div class="pf_fr_inner" data-pf-parent="">';
    echo '<label for="pfupload_listingtypes" class="lbl-text">'.esc_html__("Connection with Listing Type","pointfindert2d").':</label>';
    echo '<label class="lbl-ui select">
    <select multiple name="pfupload_listingtypes[]" id="pfupload_listingtypes">
    ';
    echo $output_options;
    echo '
    </select>
    </label>';

    echo '</div>';
    echo '</section>';


    echo '
    <script>
    jQuery(function(){
        jQuery("#pfupload_listingtypes").multiselect({
            buttonWidth: "300px",
            disableIfEmpty: true,
            nonSelectedText: "'.esc_html__("Please select","pointfindert2d").'",
            nSelectedText: "'.esc_html__("selected","pointfindert2d").'",
            allSelectedText: "'.esc_html__("All selected","pointfindert2d").'",
            selectAllText: "'.esc_html__("Select all","pointfindert2d").'",
            includeSelectAllOption: true,
            enableFiltering: true,
            filterPlaceholder: "'.esc_html__("Search","pointfindert2d").'",
            enableFullValueFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 300
        });

        jQuery("#addtag #submit").on("click",function(){
        	jQuery(document).ajaxComplete(function() {
        		jQuery("#pfupload_listingtypes").multiselect("deselectAll", false);
        		jQuery("#pfupload_listingtypes").multiselect("updateButtonText");
        	});
        });
    });
    </script>
    </td>
    </tr>
    ';
}


function pointfinder_getCurrencySymbol($currency)
{	
	$locale = "";
	
	if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		$locale = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
	}
	
	if (empty($locale)) {$locale = 'en_US';}

    $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
    
    $withCurrency = $formatter->formatCurrency(0, $currency);
    $formatter->setPattern(str_replace('¤', '', $formatter->getPattern()));
    $withoutCurrency = $formatter->formatCurrency(0, $currency);

    return str_replace($withoutCurrency, '', $withCurrency);    
}

function pointfinder_validateGeoCoords($lat,$lng) {
    /*$setup5_map_keys = PFSAIssetControl('setup5_map_keys','','');
    $st4_sp_med5 = PFSAIssetControl('st4_sp_med5','','0');

    if (empty($st4_sp_med5)) {return true;}
    if (empty($setup5_map_keys)) {return true;}
    if (empty( $lat ) && empty( $lng )) {return false;}

    $search = 'address='.$lat.','.$lng;
    $api_key = '&key=' . $setup5_map_keys;
    
    $request_url = 'https://maps.googleapis.com/maps/api/geocode/json?' . $search . $api_key;

    global $wp_version;
	$args = array(
	    'timeout'     => 5,
	    'httpversion' => '1.1',
	    'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
	    'headers'     => array(),
	    'cookies'     => array()
	); 

   $results = wp_remote_get( $request_url, $args );

    if ( !empty( $results['body'] ) ) {
        $details = json_decode( $results['body'], true );

        if (!empty($details['results'][0]['geometry']['location']['lat']) && !empty($details['results'][0]['geometry']['location']['lng'])) {
        	return true;
        }else{
        	return false;
        }
    }else{
    	return false;
    }*/
    return true;
}


function pointfinder_check_priceformatted($value){
	if (strpos($value, '.') == false && strpos($value, ',') == false) {
		return false;
	}else{
		return true;
	}
}


function pointfinder_reformat_pricevalue_for_frontend($value){
	
	if (empty($value)) {return $value;}

	$setup20_decimals_new = PFSAIssetControl('setup20_decimals_new','',2);
	$setup20_decimalpoint = PFSAIssetControl('setup20_paypalsettings_decimalpoint','','.');
	$setup20_thousands = PFSAIssetControl('setup20_paypalsettings_thousands','',',');
	$price_short = PFSAIssetControl('setup20_paypalsettings_paypal_price_short','','$');
    $price_pref = PFSAIssetControl('setup20_paypalsettings_paypal_price_pref','',1);

    if (pointfinder_check_priceformatted($value) === false) {
    	$value_formatted = number_format($value,$setup20_decimals_new,$setup20_decimalpoint,$setup20_thousands);
    }else{
    	$value_formatted = $value;
    }

    if (strpos($value, $price_short) === false) {
    	if ($price_pref == 1) {
	
			return $price_short.$value_formatted;
		
		}else{

			return $value_formatted.$price_short;

		}
    }else{
    	return $value_formatted;
    }
	

}


function pointfinder_check_tag($tag_id){
	$setup3_pointposttype_pt1 = PFSAIssetControl('setup3_pointposttype_pt1','','pfitemfinder');
	$customquery = new WP_Query( array( "post_type" => $setup3_pointposttype_pt1, "tag_id" => $tag_id ) );
	wp_reset_postdata();
	if ($customquery->found_posts > 0){
		return true;
	}else{
		return false;
	}
}


get_template_part('admin/estatemanagement/includes/functions/review','functions');
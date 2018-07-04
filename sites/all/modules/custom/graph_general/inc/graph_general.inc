<?php
include "graph_general_services.inc";
/**
* block logo of the site
*/
function graph_general_logo(){
	return theme('graph_general_logo');
}

/**
* block main menu
*/
function graph_general_main_menu(){
	$data= array();
	$menu= menu_load_links('main-menu');
	foreach ($menu as $key => $item) {
		if ($item['hidden']!= 1) {
			array_push($data, array(
				'link_title'=> $item['link_title'],
				'link_path'=> $item['link_path'],
			));
		}	
	}

	unset($data[0]);
	$data = array_values($data);
	return theme('graph_general_main_menu', array('data'=> $data));
}
/**
* block form contact
*/
function graph_general_contact(){
 	$form_contact= @drupal_render(node_view(node_load(3)));
	return theme('graph_general_contact', array('form_contact'=> $form_contact));
}

/**
* block google maps
*/
function graph_general_google_maps(){
	return theme('graph_general_google_maps');
}
 
// block outstanding(destacado)
 function graph_general_block_outstanding(){
 	$data= array();
 	$data = blockOutstanding();
	return theme('graph_general_block_outstanding', array('data'=> $data));
 }
/**
* block grid home
*/
function graph_general_grid_home(){
	$data= variable_get('graph_grid_home');
	return theme('graph_general_grid_home', array('data'=> $data));
}

/**
* block content 
*/
function graph_general_block_content(){
	$data= array();
	$data = blockContent();
	return theme('graph_general_block_content', array('data'=> $data));
}
/**
* block services 
*/
function graph_general_block_services(){
	$data= array();
	//list nodes type page
	$sections = listBlockSectios();
	$data = listNodePage();
	return theme('graph_general_block_services', array('data'=> $data,'sections'=> $sections));
}


/**
* block footer 
*/
function graph_general_block_footer(){
	$data= array();
	return theme('graph_general_block_footer', array('data'=> $data));
}

/**
* block relations 
*/
function graph_general_block_relateds(){
	$data= array();
	return theme('graph_general_block_relateds', array('data'=> $data));
}
/**
* block customers 
*/
function graph_general_block_customers(){
	$data= array();
	return theme('graph_general_block_customers', array('data'=> $data));
}

/**
* block footer 
*/
function graph_general_block_section(){
	$data= array();
	return theme('graph_general_block_section', array('data'=> $data));
}




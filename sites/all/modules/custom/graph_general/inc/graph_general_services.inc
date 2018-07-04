<?php
 function listNodePage(){
 	$result = array();
 	$data = array();
 	$sql = "SELECT n.nid,n.title,fm.fid,body.body_summary
			FROM node n 
			INNER JOIN field_data_field_image im ON im.entity_id = n.nid
			INNER JOIN  file_managed fm ON im.field_image_fid = fm.fid
			INNER JOIN  field_data_field_fecha fecha ON fecha.entity_id = n.nid
			INNER JOIN  field_data_body body ON body.entity_id = n.nid WHERE n.type='products' AND n.status=1 GROUP BY n.nid ORDER BY fecha.field_fecha_value DESC LIMIT 16";

	$result = db_query($sql)->fetchAll();
	
	foreach ($result as $key => $item) {
		array_push($data, array(
			'url' => glr_base_url(drupal_lookup_path('alias', 'node/'.$item->nid)),
			'image' => glr_utils_getImageByFid($item->fid,'img_190x190'),
			'title' => $item->title,
			'body_summary' => $item->body_summary,
			));
	}
  	return $data;
 }
	// home block Section
 function  listBlockSectios(){
 	$data = array();
	$result = array();
 	$sql = "SELECT d.tid,d.name,d.description,s.field_title_section_value FROM taxonomy_term_data d
		INNER JOIN  field_data_field_title_section s ON s.entity_id =d.tid
		WHERE vid = 2 AND  d.tid IN ('11','14','16')";
		$result = db_query($sql)->fetchAll();
		foreach ($result as $key => $item) {
		array_push($data, array(
			'name'=> $item->name,
			'url_seccion' => drupal_get_path_alias('taxonomy/term/'.$item->tid),
			'title_section' => $item->field_title_section_value,
			'description' => $item->description,
			));
	}
	return $data;
 }
 // block outstanding(destacado)
 function blockOutstanding(){
 	$result = array();
 	$data = array();
 	$sql = "SELECT n.nid,n.title,fm.fid,body.body_summary
			FROM node n 
			INNER JOIN url_alias ua ON ua.source = CONCAT('node/', n.nid)
			INNER JOIN field_data_field_image im ON im.entity_id = n.nid
			INNER JOIN  file_managed fm ON im.field_image_fid = fm.fid
			INNER JOIN   field_data_field_outstanding des ON des.entity_id = n.nid
			INNER JOIN  field_data_body body ON body.entity_id = n.nid WHERE n.type='products' AND n.status=1 AND des.field_outstanding_value =1   LIMIT 1";
	$result = db_query($sql)->fetchAll();
	foreach ($result as $key => $item) {
		array_push($data, array(
			'url' => glr_base_url(drupal_lookup_path('alias', 'node/'.$item->nid)),
			'image' => glr_utils_getImageByFid($item->fid,'img_190x190'),
			'title' => $item->title,
			'body_summary' => $item->body_summary,
			));
	}
  	return $data;
 }

 // blockContent

 function blockContent(){
 	$result = array();
 	$data = array();
 	$dataImages = array();
 	$arg1 = arg(0);
 	$arg2 = arg(1);
 	if ($arg1 == 'node' && is_numeric($arg2)) {
 		$node = node_load($arg2);
	 	$fid = $node->field_image['und'][0]['fid'];
	 	$images = $node->field_image['und'];

	 	foreach ($images as $key => $item) {
	 	$dataImages[] = array(
	 		'imagePreset' => glr_utils_getImageByFid($item['fid'],'img_600x406'),
	 		'imageThumbanil' => glr_utils_getImageByFid($item['fid'],'img_97x97'),
	 		);
	 	}
	 	
		$data = array(
			'title' => $node->title,
			'image' => glr_utils_getImageByFid($fid,'img_600x406'),
			'price' => $node->field_price['und'][0]['value'],
			'body' => $node->body['und'][0]['value'],
			'dataImages' => $dataImages,
			);
	  	return $data;
  	}
 }

 function glr_utils_getImageByFid($fid, $style = 'img_190x190') {
  if(empty($fid) || !is_numeric($fid) )
    return '';  
  return image_style_url($style, db_query("SELECT uri FROM file_managed WHERE fid=$fid")->fetchField());
}

function glr_base_url($url = 'N') {
  global $base_url;
  $retorno = ($url == 'N') ? $base_url : $base_url . '/' . $url;
  return $retorno;
}
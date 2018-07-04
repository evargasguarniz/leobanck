<?php
/*
* creado por elmer vargas elmer.vargas@glr.pe
* function graph_grid_settings_form();
*/
function graph_grid_settings_form(){
	drupal_add_css(drupal_get_path('module', 'graph_general') . '/css/graph_grilla_admin.css');
	//get data
	$form['#attributes'] = array('enctype' => "multipart/form-data");
	$data= variable_get('graph_grid_home', array());
	//print_r($data); exit();
	$form = array();
	$form['graph_outstanding_grid_home'] = array(
		'#type' => 'fieldset',
		'#prefix' => '<div id="graph-home">',
		'#suffix' => '</div>',
		'#title' => t('Estado'),
		//'#theme' => 'graph_home_form',
		'#collapsible' => TRUE, 
		'#collapsed' => FALSE, 
		'#tree' => TRUE
		);

	$form['graph_outstanding_grid_home']['checkbox_value'] = array(
      '#type' => 'checkbox',
      '#title' => t('Activo'),
      '#default_value' => isset($data['checkbox_value']['checkbox_value']) ? $data['checkbox_value']['checkbox_value'] : FALSE,
      '#required' => FALSE
    );

	$form['graph_outstanding_home'] = array(
		'#type' => 'fieldset',
		'#prefix' => '<div id="graph-home-admin">',
		'#suffix' => '</div>',
		'#title' => t('Grafica grilla home'),
		'#theme' => 'graph_home_grid',
		'#collapsible' => TRUE, 
		'#collapsed' => FALSE, 
		'#tree' => TRUE
		);


	for ($i=1; $i <=5 ; $i++) { 
		
		$form['graph_outstanding_home'][$i]['graph_home_titular_'.$i] = array(
			'#type' => 'textfield',
		'#default_value' => !empty($data['values'][$i]['grid_title']) ? $data['values'][$i]['grid_title'] : '',
			'#attributes' => array(
				'size' => 40,
				'class' => array('graph-grid-title')
				)
			);
		$form['graph_outstanding_home'][$i]['graph_home_url_'.$i] = array(
			'#type' => 'textarea',
			'#default_value' => !empty($data['values'][$i]['grid_url'])? $data['values'][$i]['grid_url'] : '',
			'#rows' => 1,
			'#attributes' => array(
				'size' => 40,
				'class' => array('graph-grid-url')
				)
			);

		// Get Image
		$image_fid = '';
		if (!empty($data['values'][$i]['grid_foto'])) {
			$image_fid = $data['values'][$i]['grid_foto'];
		}
		$form['graph_outstanding_home'][$i]['graph_foto_home_'.$i] = array(
			'#type' => 'managed_file',
			'#description' => t('Tamaño: 192x115 (gif, png, jpg, jpeg)'),
		    '#default_value' => (isset($image_fid) ? $image_fid : ''),
			'#require' => FALSE,
			'#upload_location' => 'public://grid/',
			'#upload_validators' => array(
				'file_validate_extensions' => array('jpg jpeg gif png'),
				),
		      '#theme' => 'graph_grid_thumb_upload'
			);
		$form['graph_outstanding_home'][$i]['graph_home_weight_'.$i] = array(
			'#type' => 'weight', 
			'#delta' => 5, 
			'#default_value' => $i, 
			'#title-display' => 'invisible', 
			'#attributes' => array(
				'class' => array('delta-order')
				)
			);
	# code...
	}
	$form['graph_outstanding_homemit'] = array(
		'#type' => 'submit',
		'#value' => t('Save configuration')
		);

	return  system_settings_form($form);
}

/**
 * Function graph_trivias_settings_form_validate().
 */
function graph_grid_settings_form_validate($form, &$form_state) {
	if ($form_state['submitted']) {
		$data = array();
		$dataProcess = array();
		$values = $form_state['values']['graph_outstanding_home'];
		$valu_checbox = $form_state['values']['graph_outstanding_grid_home']; 

		foreach ($values as $key => $value) {
			$grid_title = $value['graph_home_titular_'.$key];
			$grid_url = $value['graph_home_url_'.$key];
			$grid_foto = $value['graph_foto_home_'.$key];
			$weight = $value['graph_home_weight_'.$key];

			if ($grid_foto !='' && $grid_foto!=0) {
				$iamge = graph_block_guardar_archivo('graph_foto_home_'.$key,$grid_foto);
			}
			//print_r($iamge); exit();
			// Get Data Process
			//$grid_foto, 
			if ($grid_title && $grid_url) {
				$dataProcess[$weight] = array(
				'grid_title' => $grid_title, 
				'grid_url' => $grid_url,
				'grid_path_foto' => file_create_url($iamge['uri']),
				'grid_foto' => $grid_foto,
				'weight' => $weight
				);
			}
		}	
		if (!empty($dataProcess)) {
			ksort($dataProcess);
			$i = 1;
			foreach ($dataProcess as $value) {
				$data['values'][$i] = array(
					'grid_title' => $value['grid_title'], 
					'grid_url' => $value['grid_url'], 
					'grid_path_foto' => $value['grid_path_foto'],
					'grid_foto' => $value['grid_foto'], 
					'weight' => $i
					);
				$i++;
			}
		}
		if (!empty($valu_checbox)) {
			$data['checkbox_value']=$valu_checbox;
		}
		variable_set('graph_grid_home', $data);
	}
}

/**
 * Guarda archivo de forma permanente
 * @param string $key es el key del arreglo
 * @param string $value es el id de la imagen
 */
function graph_block_guardar_archivo($key,$value) {
  // Verifica que el key sea 'foto' y que sea direfente de 0 para guardarlo
	$data= array();
  if (strpos($key, 'foto') !== FALSE && !empty($value)) {
    $file = file_load($value);
    $file->status = FILE_STATUS_PERMANENT;
    file_save($file);
    // Evita el mensaje de error "El archivo usado en el campo no puede ser referenciado"
    file_usage_add($file, 'mantis', 'user', 1);
    $data= array('uri'=>$file->uri);
  }
  return $data;
}

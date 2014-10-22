<?php

/**
 * User model config
 */

return array(

	'title' => 'Album',

	'single' => 'album',

	'model' => 'Album',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'year' => array(
			'title' => 'Year')
		
	),

	
	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		)
		
	),

);
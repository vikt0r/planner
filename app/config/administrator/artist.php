<?php

/**
 * User model config
 */

return array(

	'title' => 'Artist',

	'single' => 'artist',

	'model' => 'Artist',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		)
		
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
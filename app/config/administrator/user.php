<?php

/**
 * User model config
 */

return array(

	'title' => 'User',

	'single' => 'user',

	'model' => 'User',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'email' => array(
			'title' => 'Email'
		),
		
	),

	
	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		),
		'email' => array(
			'title' => 'Email',
			'type' => 'text',
		)
		
	),

);
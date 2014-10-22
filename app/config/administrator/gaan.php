<?php

/**
 * Gaans model config
 */

return array(

	'title' => 'Gaan',

	'single' => 'gaan',

	'model' => 'Gaan',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'trackno' => array(
			'title' => 'Track'
		),
		'title' => array(
			'title' => 'Title',
		),
		'playtime' => array(
			'title' => 'Playtime',
		),
		'filename' => array(
			'title' => 'Filename'
		),
		'year' => array(
			'title' => 'Year'
		),
		'updated_at' => array(
			'title' => 'Updated'
		)
		
	),

	

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'title' => array(
			'title' => 'Title',
			'type' => 'text',
		),
		// 'last_name' => array(
		// 	'title' => 'Last Name',
		// 	'type' => 'text',
		// ),
		// 'birth_date' => array(
		// 	'title' => 'Birth Date',
		// 	'type' => 'date',
		// ),
		// 'films' => array(
		// 	'title' => 'Films',
		// 	'type' => 'relationship',
		// 	'name_field' => 'name',
		// ),
	),

);
<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2019 SalesAgility Ltd.
 *
 * Developer: Ruvin Roshan (c) 2020
 *
 */
$manifest = array(
	0 => array(
		'acceptable_sugar_versions' => array(
			0 => '',
		),
	),
	1 => array(
		'acceptable_sugar_flavors' => array(
			0 => 'CE',
			1 => 'PRO',
			2 => 'ENT',
		),
	),
	'readme' => '',
	'key' => 'CS',
	'author' => 'Conscious',
	'description' => 'Extend the functionality of Activity Stream Dashlet to display Calls and Meetings',
	'icon' => '',
	'is_uninstallable' => true,
	'name' => 'Activity Stream Dashlet Calls and Meetings',
	'published_date' => '2020-04-22',
	'type' => 'module',
	'version' => 'v1.0.0',
	'remove_tables' => 'prompt',
);

$installdefs = array(
	'id' => 'Activity_Stream_Dashlet_Calls_and_Meetings',
	//'image_dir' => '<basepath>/icons',
	'copy' => array(
		0 => array(
			'from' => '<basepath>/custom/modules/Calls',
			'to' => 'custom/modules/Calls',
		),
		1 => array(
			'from' => '<basepath>/custom/modules/Meetings',
			'to' => 'custom/modules/Meetings',
		),	
	),
	'logic_hooks' => array(
		0 => array(
			'module' => 'Calls',
			'hook' => 'after_save',
			'order' => 8,
			'description' => 'conscious activity stream call',
			'file' => 'custom/modules/Calls/conscious_activity_stream_call/conscious_activity_stream_call.php',
			'class' => 'conscious_activity_stream_call',
			'function' => 'save_to_tbl',
		),

1 => array(
			'module' => 'Meetings',
			'hook' => 'after_save',
			'order' => 8,
			'description' => 'conscious activity stream meeting',
			'file' => 'custom/modules/Meetings/conscious_activity_stream_meeting/conscious_activity_stream_meeting.php',
			'class' => 'conscious_activity_stream_meeting',
			'function' => 'save_to_tbl',
		),



	),
	'post_uninstall' => array(
		0 => '<basepath>/scripts/post_uninstall.php',
	),
	'post_install' => array(
		0 => '<basepath>/scripts/post_install.php',
	),

);
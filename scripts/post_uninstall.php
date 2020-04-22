<?php
if (!defined('sugarEntry') || !sugarEntry) {
	die('Not A Valid Entry Point');
}

function post_uninstall() {
	global $sugar_config, $current_user, $db;

	$DeleteQuery1 = " DELETE FROM config WHERE category='sugarfeed' AND name='module_Calls' ";
	$db->query($DeleteQuery1);

	$DeleteQuery2 = " DELETE FROM config WHERE category='sugarfeed' AND name='module_Meetings' ";
	$db->query($DeleteQuery2);

}

post_uninstall();

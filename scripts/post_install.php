<?php
if (!defined('sugarEntry') || !sugarEntry) {
	die('Not A Valid Entry Point');
}

function post_install() {
	global $sugar_config, $current_user, $db;
	require_once 'install/install_utils.php';

# install 1
$InsertQuery1 = " INSERT INTO config (category, name, value) VALUES ('sugarfeed', 'module_Calls', '1') ";
$db->query($InsertQuery1);

# install 2
$InsertQuery2 = " INSERT INTO config (category, name, value) VALUES ('sugarfeed', 'module_Meetings', '1') ";
$db->query($InsertQuery2);

}

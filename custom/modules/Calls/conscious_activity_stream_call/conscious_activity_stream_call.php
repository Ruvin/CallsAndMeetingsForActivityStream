<?php
if (!defined('sugarEntry') || !sugarEntry) {
	die('Not A Valid Entry Point');
}

class conscious_activity_stream_call {


function save_to_tbl($bean, $event, $arguments) {

if ($_REQUEST['module'] == 'Calls') {

global $db, $timeDate, $current_user, $sugar_config;
$timeDate = new TimeDate();
$now_raw = date('Y-m-d H:i:s');
$now = new DateTime($now_raw);
$now_formated = new DateTime($now_raw);
$now_formated = $now_formated->format('Y-m-d H:i:s');

require_once 'modules/SugarFeed/SugarFeed.php';

$SugarFeed = new SugarFeed();
if(isset($_REQUEST['record']) && !empty($_REQUEST['record'])){
$feedStatus = 'Edit a call';
}else{
$feedStatus = '{SugarFeed.CREATED_CONTACT}';
}

if(isset($bean->contact_id) && !empty($bean->contact_id)){
$SugarFeed->name = '<b>{this.CREATED_BY}</b> ' .$feedStatus. ' [Calls:'.$bean->id.':' .$bean->name.'] link to [Contacts:' .$bean->contact_id. ':' .$bean->contact_name. '] ' ;	
}else{
$SugarFeed->name = '<b>{this.CREATED_BY}</b> ' .$feedStatus. ' [Calls:'.$bean->id.':' .$bean->name.'] ' ;	
}

$SugarFeed->date_entered = $bean->date_entered;
$SugarFeed->date_modified = $bean->date_modified;
$SugarFeed->modified_user_id = $bean->modified_user_id;
$SugarFeed->created_by = $bean->created_by;
$SugarFeed->description = $bean->description;
$SugarFeed->deleted = '0';
$SugarFeed->assigned_user_id = $bean->assigned_user_id;
$SugarFeed->related_module ='Calls';
$SugarFeed->related_id = $bean->id;
//$SugarFeed->link_url ='';
//$SugarFeed->link_type = '';
$SugarFeed->save();


}
}











// 	function changeName(&$bean, $event, $arguments) {

// 		if ($_REQUEST['module'] == 'ProjectTask' && !empty($bean->project_name) && !empty($bean->name)) {

// 			$nameCount = count(explode('-', $bean->name));
// 			if ($nameCount > 1) {

// 				$firstValBefore = explode('-', $bean->name);
// 				$firstVal = trim($firstValBefore[0]);

// 				$char = str_split($firstVal);
// 				$charFirst = array_shift($char); // cehck [
// 				$charLast = end($char); // check ]

// 				if ($charFirst == '[' && $charLast == ']') {
// 					$ProjectTaskNa = end(explode('-', $bean->name));
// 					$ProjectTaskNewName = '[' . $bean->project_name . '] - ' . $ProjectTaskNa;
// 					$bean->name = trim($ProjectTaskNewName);
// 				}

// 			}

// 			// else {
// 			// 	$ProjectTaskNewName = $bean->project_name . ' - ' . $bean->name;
// 			// 	$bean->name = trim($ProjectTaskNewName);
// 			// }

// 		}
// 	}

// // 	function updateTheProjectTasks($bean, $event) {

// // 		$project_id = $_REQUEST['project_id'];
// 	// 		$record_id = $_REQUEST['record'];
// 	// 		$module = $_REQUEST['module'];
// 	// 		$action = $_REQUEST['action'];

// // # SELECT Duplicate Button action when Click
// 	// 		if ($module == 'Project' && !empty($action) && !empty($project_id) && !empty($record_id) && ($project_id == $record_id)) {

// // 			// var_dump($bean->id);
// 	// 			// var_dump($bean);
// 	// 			// var_dump($event);
// 	// 			//	var_dump($_REQUEST);

// // 			// die();
// 	// 			// // var_dump($event);
// 	// 			// var_dump($project_id);

// // 			//	$sql2 = "SELECT name FROM project WHERE id=" . $GLOBALS["db"]->quoted($project_id);
// 	// 			//$ProjectName = $GLOBALS["db"]->query($sql2);

// // 			$ProjectName = BeanFactory::getBean('Project')->retrieve_by_string_fields(array('id' => $project_id))->name;

// // 			//var_dump($sql2);
// 	// 			//var_dump($ProjectName);
// 	// 			//	die();

// // 			$project_tasks = array();
// 	// 			$sql = "SELECT id, project_id, name, deleted FROM project_task WHERE project_id=" . $GLOBALS["db"]->quoted($project_id) . " AND deleted=0 order by name";
// 	// 			$result = $GLOBALS["db"]->query($sql);
// 	// 			while ($project_task = $GLOBALS["db"]->fetchByAssoc($result)) {
// 	// 				$project_tasks[] = $project_task;
// 	// 			}

// // 			//	$GLOBALS['log']->fatal(print_r($project_id, true));
// 	// 			//$GLOBALS['log']->fatal(print_r($project_tasks, true));

// // 			//echo '------------------------------------';
// 	// 			//	var_dump($project_tasks);
// 	// 			//	die();

// // 			foreach ($project_tasks as $key1 => $value1) {

// // 				$nameCount = count(explode('-', $value1['name']));

// // 				// var_dump($nameCount);
// 	// 				// $firstValBeforess = explode('-', $value1['name']);
// 	// 				// var_dump($firstValBeforess);

// // 				if ($nameCount > 1) {

// // 					$firstValBefore = explode('-', $value1['name']);
// 	// 					$firstVal = trim($firstValBefore[0]);
// 	// 					$LastVal = trim($firstValBefore[1]);

// // 					//	var_dump($firstValBefore);
// 	// 					//	var_dump($firstVal);
// 	// 					//	var_dump($LastVal);

// // 					// $char = str_split($firstVal);
// 	// 					// $charFirst = array_shift($char); // cehck [
// 	// 					// $charLast = end($char); // check ]

// // 					// var_dump($firstVal);
// 	// 					// var_dump($char);
// 	// 					// var_dump($charFirst);
// 	// 					// var_dump($charLast);
// 	// 					// die();

// // 					// if ($charFirst == '[' && $charLast == ']') {
// 	// 					// 	$ProjectTaskNa = end(explode('-', $value1['name']));

// // 					$ProjectTaskNewName = $ProjectName . ' - ' . $LastVal;
// 	// 					$ProjectTaskAlterName = trim($ProjectTaskNewName);

// // 					$sql1 = "UPDATE project_task SET name =" . $GLOBALS["db"]->quoted($ProjectTaskAlterName) . " WHERE id=" . $GLOBALS["db"]->quoted($value1['id']);
// 	// 					$result = $GLOBALS["db"]->query($sql1);

// // 					// var_dump($sql1);
// 	// 					// die();

// // 					// }

// // 				}

// // 			}

// // 			// var_dump($project_tasks);
// 	// 			// die('xxx');
// 	// 		}

// // 	}

} // end class

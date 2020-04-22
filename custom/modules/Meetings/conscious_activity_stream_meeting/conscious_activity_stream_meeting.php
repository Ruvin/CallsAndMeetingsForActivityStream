<?php
if (!defined('sugarEntry') || !sugarEntry) {
	die('Not A Valid Entry Point');
}

class conscious_activity_stream_meeting {


function save_to_tbl($bean, $event, $arguments) {

if ($_REQUEST['module'] == 'Meetings') {

global $db, $timeDate, $current_user, $sugar_config;
$timeDate = new TimeDate();
$now_raw = date('Y-m-d H:i:s');
$now = new DateTime($now_raw);
$now_formated = new DateTime($now_raw);
$now_formated = $now_formated->format('Y-m-d H:i:s');
require_once 'modules/SugarFeed/SugarFeed.php';

$SugarFeed = new SugarFeed();
if(isset($_REQUEST['record']) && !empty($_REQUEST['record'])){
$feedStatus = 'Edit a Meeting';
}else{
$feedStatus = '{SugarFeed.CREATED_CONTACT}';
}

if(isset($bean->contact_id) && !empty($bean->contact_id)){
$SugarFeed->name = '<b>{this.CREATED_BY}</b> ' .$feedStatus. ' [Meetings:'.$bean->id.':' .$bean->name.'] link to [Contacts:' .$bean->contact_id. ':' .$bean->contact_name. '] ' ;	
}else{
$SugarFeed->name = '<b>{this.CREATED_BY}</b> ' .$feedStatus. ' [Meetings:'.$bean->id.':' .$bean->name.'] ' ;	
}

$SugarFeed->date_entered = $bean->date_entered;
$SugarFeed->date_modified = $bean->date_modified;
$SugarFeed->modified_user_id = $bean->modified_user_id;
$SugarFeed->created_by = $bean->created_by;
$SugarFeed->description = $bean->description;
$SugarFeed->deleted = '0';
$SugarFeed->assigned_user_id = $bean->assigned_user_id;
$SugarFeed->related_module ='Meetings';
$SugarFeed->related_id = $bean->id;
//$SugarFeed->link_url ='';
//$SugarFeed->link_type = '';
//$SugarFeed->save();

// var_dump($_REQUEST);
// var_dump($event);
// var_dump($arguments);
// var_dump($bean);

$SugarFeed->save();

}
}



// function save_to_tbl($bean, $event, $arguments) {

// 	if ($_REQUEST['module'] == 'Calls') {

// global $db, $timeDate, $current_user, $sugar_config;
// $timeDate = new TimeDate();
// $now_raw = date('Y-m-d H:i:s');
// $now = new DateTime($now_raw);
// $now_formated = new DateTime($now_raw);
// $now_formated = $now_formated->format('Y-m-d H:i:s');

// require_once 'modules/SugarFeed/SugarFeed.php';


// //var_dump($_REQUEST);
// //die();


// // var_dump($bean->name);
// // var_dump($bean->date_entered);
// // var_dump($bean->date_modified);
// // var_dump($bean->modified_user_id);
// // var_dump($bean->created_by);
// // var_dump($bean->description);
// // var_dump($bean);




// // var_dump($bean->name);
// // die();



// $SugarFeed = new SugarFeed();

// if(isset($_REQUEST['record']) && !empty($_REQUEST['record'])){
// $feedStatus = 'Edit a call';
// }else{
// $feedStatus = '{SugarFeed.CREATED_CONTACT}';
// }

// if(isset($bean->contact_id) && !empty($bean->contact_id)){
// $SugarFeed->name = '<b>{this.CREATED_BY}</b> ' .$feedStatus. ' [Calls:'.$bean->id.':' .$bean->name.'] talk to [Contacts:' .$bean->contact_id. ':' .$bean->contact_name. '] ' ;	
// }else{
// $SugarFeed->name = '<b>{this.CREATED_BY}</b> ' .$feedStatus. ' [Calls:'.$bean->id.':' .$bean->name.'] ' ;	
// }




// $SugarFeed->date_entered = $bean->date_entered;
// $SugarFeed->date_modified = $bean->date_modified;
// $SugarFeed->modified_user_id = $bean->modified_user_id;
// $SugarFeed->created_by = $bean->created_by;
// $SugarFeed->description = $bean->description;
// $SugarFeed->deleted = '0';
// $SugarFeed->assigned_user_id = $bean->assigned_user_id;
// $SugarFeed->related_module ='Calls';
// $SugarFeed->related_id = $bean->id;
// //$SugarFeed->link_url ='';
// //$SugarFeed->link_type = '';
// //$SugarFeed->save();

// // var_dump($_REQUEST);
// // var_dump($event);
// // var_dump($arguments);
// // var_dump($bean);

// 	$SugarFeed->save();


// // //$id = '';
// // $name = '';
// // $date_entered = '';
// // $date_modified = '';
// // $modified_user_id = '';
// // $created_by = '';
// // $description = '';
// // $deleted = '';
// // $assigned_user_id = '';
// // $related_module = '';
// // $related_id = '';
// // $link_url = '';
// // $link_type = '';




// //var_dump('1');
// //die();


// }

// }



} // end class

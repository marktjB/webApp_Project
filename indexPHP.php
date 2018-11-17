<?php
require ('./DBFiles/sql_queries.php');
require ('./DBFiles/DBConnect.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'select_all';
    }
}
if ($action == 'select_all'){
	//$view = select_all();
	include('indexHTML.php');
}
?>


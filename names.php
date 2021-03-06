<?php
include_once("lib/backend/database.inc.php");
include_once("lib/login/session.inc.php");
include_once("lib/error.inc.php");

try {
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Content-type: application/json; charset=utf-8');

	// get logger
	$logger = "uvr1611";
	if(isset($_GET["logger"])) {
		$logger = $_GET["logger"];
	}
	
	$database = Database::getInstance();

	if(login_check()) {
		echo json_encode($database->getNames($logger));
	}
}
catch(Exception $e) {
	sendAjaxError($e);
}

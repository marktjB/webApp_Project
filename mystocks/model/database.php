<?php
	$dsn = 'mysql:host=localhost;dbname=project_db';
	$dbusername = 'markB';
	$dbpassword = '4297';
	
	try {
		$db = new PDO($dsn, $dbusername, $dbpassword);
	} catch (PDOException $e) {
		echo '<p>error</p>';
		exit();
	}
?>
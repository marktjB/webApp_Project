<?php
	$dsn = 'mysql:host=localhost;dbname=mystocksdb';
	$dbusername = 'root';
	$dbpassword = '';
	
	try {
		$db = new PDO($dsn, $dbusername, $dbpassword);
	} catch (PDOException $e) {
		?>
			<p>Error</p>
		<?php
		exit();
	}
?>
<?php
    $server = 'mysql:host=localhost;dbname=project_db';
    $username = 'markB';
    $password = '4297';

   try {
        $db = new PDO($server, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to
				the database: $error_message </p>";
    }
?>
<?php
	if(isset($_POST['login-submit'])){
		require 'database.php';
		$emailuid = $_POST['emailuid'];
		$password = $_POST['pwd'];
		
		if(empty($emailuid) || empty($password)){
			header("Location: ../index.php?error=emptyfields");
			exit();
		} else {
			$query = 'SELECT * FROM users 
					  WHERE uidUsers = :emailuid 
					  OR emailUsers = :emailuid';
			$statement = $db->prepare($query);
			$statement->bindValue(":emailuid", $emailuid);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			if($result != null){
				$pwdCheck = password_verify($password, $result['pwdUsers']);
				if($pwdCheck == false) {
					header("Location: ../index.php?error=wrongpassword");
					exit();
				} else if($pwdCheck == true) {
					session_start();
					$_SESSION['userId'] = $result['idUsers'];
					$_SESSION['userUid'] = $result['idUsers'];
					
					header("Location: ../index.php?login=success");
					exit();
				} else {
					header("Location: ../index.php?error=wrongpassword");
					exit();
				}
			} else {
				header("Location: ../index.php?error=nouser");
				exit();
			}
		}
	} else {
		header("Location: ../index.php");
		exit();
	}
?>
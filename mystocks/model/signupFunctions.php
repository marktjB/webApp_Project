<?php
	if(isset($_POST['signup-submit'])){
		require 'database.php';
		$username = $_POST['uid'];
		$email = $_POST['email'];
		$password = $_POST['pwd'];
		$passwordRepeat = $_POST['pwd-repeat'];
		
		if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
			header("Location: ../signup.php?error=emptyfields&uid=".$username."$email=".$email);
			exit();
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invalidemailuid");
			exit();
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?error=invalidemail&uid=".username);
			exit();
		} else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invaliduid&email=".email);
			exit();
		} else if($password !== $passwordRepeat){
			header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
			exit();
		} else {
			$query = "SELECT uidUsers FROM users WHERE uidUsers = :uid";
			$statement = $db->prepare($query);
			$statement->bindValue(":uid", $username);
			$statement->execute();
			$result = $statement->fetchAll();
			$resultCheck = count($result);
			if($resultCheck > 0) {
				header("Location: ../signup.php?error=usertaken&email=".$email);
				exit();
			} else {
				$query = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (:uid, :email, :pwd)";
				$statement = $db->prepare($query);
				$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
				$statement->bindValue(":uid", $username);
				$statement->bindValue(":email", $email);
				$statement->bindValue(":pwd", $hashedPwd);
				$statement->execute();
				header("Location: ../signup.php?signup=success");
				exit();
			}
		}
	} else {
		header("Location: ../signup.php");
		exit();
	}
?>
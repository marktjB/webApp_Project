<?php
	session_start();
	/*
	$action = $_GET['action'];
	
	if($action == null || $action == false) {
		$action = 'viewStocks';
	}*/
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Stocks</title>
	</head>
	<header>
		<nav>
			<ul>
			<!--
				<li>
					<a href="index.php?action=viewStocks">View Current Stock Trends</a>
				</li>-->
			</ul>
			<div>
			<?php
				if(isset($_SESSION['userId'])) {
				echo '<form action="model/logoutFunctions.php" method="post">
					<button type="submit" name="logout-submit">Logout</button>
					</form>';
				} else {
				echo '<form action="model/loginFunctions.php" method="post">
					<input type="text" name="emailuid" placeholder="Username/E-mail...">
					<input type="password" name="pwd" placeholder="Password...">
					<button type="submit" name="login-submit">Login</button>
					</form>
					<a href="signup.php">Signup</a>';
				}
			?>
			</div>
		</nav>
	</header>
<?php
	session_start();
	require 'model/Stock.php';
	require 'model/User.php';
	require 'model/Share.php';

	$user;
	if(isset($_SESSION['userId']))
	{
		$user = new User($_SESSION['userId']);
	}
	//require 'model/database.php';
	/*
	$action = $_GET['action'];
	
	if($action == null || $action == false) {
		$action = 'viewStocks';
	}*/
	

	//create objects for stocks
	$tencent = new Stock('Tencent_Holdings');
	$blizzard = new Stock('Activision_Blizzard');
	$ea = new Stock('Electronic_Arts');
	$netease = new Stock('NetEase');

	//if the user is logged in, fill the stock objects with the latest data
	if(isset($_SESSION['userId'])){
		require 'model/database.php';
		$query = 'SELECT * FROM stocks ORDER BY Date DESC LIMIT 1';
		$statement = $db->prepare($query);
		$statement->execute();
		$currentValues = $statement->fetch();
		$statement->closeCursor();


		$tencent->setCurrentValue($currentValues['Tencent_Holdings']);
		$blizzard->setCurrentValue($currentValues['Activision_Blizzard']);
		$ea->setCurrentValue($currentValues['Electronic_Arts']);
		$netease->setCurrentValue($currentValues['NetEase']);
		$_SESSION['tencent'] = $tencent;
		$_SESSION['blizzard'] = $blizzard;
		$_SESSION['ea'] = $ea;
		$_SESSION['netease'] = $netease;
	}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../style.css" />
	<head>
		<meta charset="utf-8">
		<title>My Stocks</title>
	</head>
	<header>
		<nav>
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="viewTrends.php">View Trends</a>
				</li>
				<?php
				if(isset($_SESSION['userId'])) {
				echo '
					<li>
						<a href="myCart.php">View Cart</a>
					</li>
					<li>
						<a href="myShares.php">My Shares</a>
					</li>
					<li>
						<form action="model/logoutFunctions.php" method="post">
							<button type="submit" name="logout-submit">Logout</button>
						</form>
					</li>';
				} else {
				echo '
					<li>
						<a href="signup.php">Signup</a>
					</li>
					<form action="model/loginFunctions.php" method="post">
							<input type="text" name="emailuid" placeholder="Username/E-mail...">
							<input type="password" name="pwd" placeholder="Password...">
							<button type="submit" name="login-submit">Login</button>
					</form>';
				}
			?>
			</ul>
		</nav>
	</header>
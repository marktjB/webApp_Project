<?php
	require "view/header.php";
?>

	<main>
		<div>
			<section>
				<h1>Signup</h1>
				
				<?php
					if(isset($_GET['error'])) {
						if($_GET['error'] == "emptyfields") {
							echo '<p>fill in all fields!</p>';
						} else if ($_GET['error'] == "invaliduidemail"){
							echo '<p>invalid email and username</p>';
						} else if ($_GET['error'] == "invaliduid"){
							echo '<p>uinvalid username</p>';
						} else if ($_GET['error'] == "invalidemail"){
							echo '<p>uinvalid email</p>';
						} else if ($_GET['error'] == "passwordcheck"){
							echo '<p>passwords do not match</p>';
						} else if ($_GET['error'] == "usertaken"){
							echo '<p> RIP. someone already has that username...</p>';
						}
					}
				?>
				<form action="model/signupFunctions.php" method="post">
					<input type="text" name="uid" placeholder="Username">
					<input type="text" name="email" placeholder="E-mail">
					<input type="password" name="pwd" placeholder="Password">
					<input type="password" name="pwd-repeat" placeholder="Repeat password">
					<button type="submit" name="signup-submit">Signup</button>
				</form>
			</section>
		</div>
	</main>
	
<?php
	require "view/footer.php";
?>
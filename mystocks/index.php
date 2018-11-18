<?php
	require "view/header.php";
?>

	<main>
		<div>
			<section>
			<?php
			if(isset($_SESSION['userId'])) {
				echo '<p>You are logged in!</p>';
				include "view/viewTable.php";
			} else {
				echo '<p>You are logged out!</p>';
			}
			?>
			</section>
		</div>
	</main>
	
<?php
	require "view/footer.php";
?>
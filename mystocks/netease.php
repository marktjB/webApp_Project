<?php
	require 'view/header.php';
	
	$img_pull = 'images/netease.png';
	$image_alt = 'Image: netease.png';
?>

<main>
<head>
	<style>
		nav {text-align: left;}
	</style>
<head>
<header>
	<nav>
		<ul>
			<li>
				<a href="tencent.php">Tencent Holdings</a>
			</li>
			<li>
				<a href="viewTrends.php">Activision-Blizzard</a>
			</li>
			<li>
				<a href="ea.php">Electronic Arts</a>
			</li>
			<li>
				<a href="netease.php">NetEase</a>
			</li>
		</ul>
	</nav>
</header>
<p>
	<img src ="<?php echo $img_pull; ?>"
		alt="<?php echo $image_alt; ?>" />
</p>
</main>
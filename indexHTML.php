<?php
require ('./DBFiles/sql_queries.php');
require ('./DBFiles/DBConnect.php');

$query = 'SELECT * FROM stocks';
    $statement = $db->prepare($query);
    $statement->execute();
?>

<main>
<link rel="stylesheet" type="text/css" href="style.css" />
<h1>Here are the stocks data:</h1>
	<table>
        <tr>
            <th>Date</th>
            <th>Tencent Holdings</th>
			<th>Activision-Blizzard</th>
            <th>Electronic Arts</th>
			<th>NetEase</th>
        </tr>

        <?php foreach ($statement as $display) : ?>
        <tr>
            <td><?php echo $display['Date']; ?></td>
			<td><?php echo $display['Tencent_Holdings']; ?></td>
			<td><?php echo $display['Activision_Blizzard']; ?></td>
            <td><?php echo $display['Electronic_Arts']; ?></td>
            <td><?php echo $display['NetEase']; ?></td>
        </tr>
        <?php endforeach; ?>            
    </table>
	<nav>
		<ul>
			<li><a href="./index.php">Return</a></li>
		</ul>
	</nav>
	
	<h2>test msg<h2>


<main>

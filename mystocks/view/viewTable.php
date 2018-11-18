<?php
    require './model/database.php';
    $query = 'SELECT * FROM stocks';
    $statement = $db->prepare($query);
    $statement->execute();

    $action = filter_input(INPUT_POST, 'action');
    switch ($action){
        case 'buy-tencent':
            {
                $tencent->buyStock($user);
            }
        break;
        case 'buy-blizzard':
            {
                $blizzard->buyStock($user);
            }
        break;
        case 'buy-ea':
            {
                $ea->buyStock($user);
            }
        break;
        case 'buynetease':
            {
                $netease->buyStock($user);
            }
        break;
    }
?>
<!--This is Marks code from indexHTML.php-->
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
        <tr>
            <td></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="buy-tencent">
                    <input type="submit" value="Buy Tencent Holdings">
                </form>
            </td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="buy-blizzard">
                    <input type="submit" value="Buy Activision-Blizzard">
                </form>
            </td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="buy-ea">
                    <input type="submit" value="Buy Electronic Arts">
                </form>
            </td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="buy-netease">
                    <input type="submit" value="Buy NetEase">
                </form>
            </td>
        </tr>            
    </table>
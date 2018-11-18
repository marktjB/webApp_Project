<?php
    require "view/header.php";
    $query ='SELECT * FROM experimentalshares WHERE ownerId = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $user->getId());
    $statement->execute();
    $getShares = $statement->fetchAll();
    $statement->closeCursor();
    $shares = array();
    foreach($getShares as $getShare){
        $share;
        switch($getShare['company']){
            case 'Tencent_Holdings':
                $share = new Share($getShare['shareId'], $getShare['ownerId'], $tencent);
            break;
            case 'Activision_Blizzard':
            $share = new Share($getShare['shareId'], $getShare['ownerId'], $blizzard);
            break;
            case 'Electronic_Arts':
            $share = new Share($getShare['shareId'], $getShare['ownerId'], $ea);
            break;
            case 'NetEase':
            $share = new Share($getShare['shareId'], $getShare['ownerId'], $netease);
            break;
        }
        $share->setOriginalValue($getShare['valueAtPurchase']);
        $shares[] = $share;
    }
?>
<main>
		<div>
			<section>
                <h1>My Shares:</h1>
                <table>
                    <tr>
                        <td>
                            <strong>Company</strong>
                        </td>
                        <td>
                            <strong>Value At Purchase</strong>
                        </td>
                        <td>
                            <strong>Current Value</strong>
                        </td>
                        <td>
                            <strong>Trend + or -</strong>
                        </td>
                    </tr>
                    <?php foreach($shares as $share) : ?>
                    <tr>
                        <td>
                            <?php echo $share->getCompanyName(); ?>
                        </td>
                        <td>
                            <?php echo $share->getOriginalValue(); ?>
                        </td>
                        <td>
                            <?php echo $share->getCurrentValue(); ?>
                        </td>
                        <td>
                            <?php echo $share->getDifference(); ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
			</section>
		</div>
	</main>

<?php
	require "view/footer.php";
?>
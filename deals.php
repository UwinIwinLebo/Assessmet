<?php
	include_once('header.php');
    $deals = $database->getDeals();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Deals</title>
	<link rel="stylesheet" type="text/css" href="css/styling.css">
</head>
<body>
    <h1> Deals </h1>
    <button><a href="/uwin_iwin/create_deal.php" class="button"> Create Deal </a></button>
    <table border=1 class="table table-sm">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Client</th>
                    <th>Value</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
        	    foreach ($deals as $dealId => $deal) {
        	?>
                    <tr>
                        <td><?php echo $deal['user'] ?></td>
                        <td><?php echo $deal['client'] ?></td>
                        <td>R<?php echo $deal['value'] ?></td>
                        <td><?php echo $deal['date'] ?></td>
                        <td>
                            <button><a href="/uwin_iwin/edit_deal.php?id=<?php echo $dealId; ?>" class="button"> Edit </a></button>
                        </td>
                    </tr>
            <?php        	
            	}
            ?>
            </tbody>
        </table>
    </body>
</html>
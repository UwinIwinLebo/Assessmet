<?php
	include_once('header.php');
    $users = $database->getUsers();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Deals</title>
	<link rel="stylesheet" type="text/css" href="css/styling.css">
</head>
<body>
<h1> Users </h1>
<button><a href="/uwin_iwin/create_user.php" class="button"> Create User </a></button>
<table border=1 class="table table-sm">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Username</th>
                    <th>Enabled</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
        	    foreach ($users as $userId => $user) {
        	?>
                    <tr>
                        <td><?php echo $user['firstname'] ?></td>
                        <td><?php echo $user['surname'] ?></td>
                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo ($user['enabled'] == 't' ? 'True' : 'False')?></td>
                        <td>
                            <button><a href="/uwin_iwin/edit_user.php?id=<?php echo $userId; ?>" class="button"> Edit </a></button>
                        </td>
                    </tr>
            <?php        	
            	}
            ?>
            </tbody>
        </table>
    </body>
</html>
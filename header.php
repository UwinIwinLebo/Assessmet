<?php
	include_once('database.php');
    $database = new database();

	if(isset($_POST['logout'])){
        $database->logout();
    }

    if(!($_SESSION)){  
        header("Location:index.php");  
    }
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Deals</title>
	<link rel="stylesheet" type="text/css" href="css/styling.css">
</head>
<body>
	<div id="home" class="animate form">
        <h1>Logged In</h1>
		<form name="" method="post" action="">
            <div>
                <button><a href="/uwin_iwin/home.php" class="button"> Home </a></button>
    			<button><a href="/uwin_iwin/users.php" class="button"> Users </a></button>
    			<button><a href="/uwin_iwin/deals.php" class="button"> Deals </a></button>
        	    <input type="submit" name="logout" value="Log out"/>   
            </div>
        </form>  
    </div>  
</body>
</html>
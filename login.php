<?php

	include_once('database.php');
	$database = new database();

    if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
        header("Location:home.php"); 
    }

	if(isset($_POST['login'])){
        $username = $_POST['username'];   
        $password = $_POST['password'];
        $login = $database->login($username, $password);
        if($login){  
           	header("Location:home.php"); 
        }else{  
            echo "<script>alert('Login Not Successful')</script>";  
        }
    }

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Deals | Login</title>
	<link rel="stylesheet" type="text/css" href="css/styling.css">
</head>
<body>
	<div id="login" class="animate form">  
        <form name="login" method="post" action="">  
            <h1> Log In </h1>
            <p>   
            	<label>username</label>  
                <input id="username" name="username" required="required" type="text" placeholder="" />  
  			</p>  
            <p>   
                <label>password </label>  
                <input id="password" name="password" required="required" type="password" placeholder=""/>  
            </p>
            <p class="signin button">   
        	    <input type="submit" name="login" value="Log in"/>   
            </p>  
        </form>  
    </div>  
</body>
</html>
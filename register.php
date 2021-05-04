<?php
	include_once('database.php');
	$database = new database();  
	if(isset($_POST['register'])){
        $username = $_POST['username'];   
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $surname  = $_POST['surname'];
        $exists = $database->isUserExist($username); 

        if(!$exists){ 
            $register = $database->userRegister($username, $password, $firstname, $surname);  
            if($register > 0){  
               	header("Location:home.php"); 
            }else{  
                echo "<script>alert('Registration Not Successful')</script>";  
            }  
        } else {  
            echo "<script>alert('Username already exist')</script>";  
    	}
    }
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Deals</title>
	<link rel="stylesheet" type="text/css" href="css/styling.css">
</head>
<body>
	<div id="register" class="animate form">  
        <form name="register" method="post" action="">  
            <h1> Sign up </h1>

            <p>   
            	<label>First Name</label>  
                <input id="firstname" name="firstname" required="required" type="text" placeholder="" />  
  			</p>  
  			<p>   
            	<label>Surame</label>  
                <input id="surname" name="surname" required="required" type="text" placeholder="" />  
  			</p>  
            <p>   
            	<label>username</label>  
                <input id="username" name="username" required="required" type="text" placeholder="" />  
  			</p>  
            <p>   
                <label>password </label>  
                <input id="password" name="password" required="required" type="password" placeholder=""/>  
            </p>
            <p class="button">   
        	    <input type="submit" name="register" value="Register"/>   
            </p>  
            <p class="">    
                Already a member ?  
                <a href="/uwin_iwin/login.php" class="to_register"> Go and log in </a>  
            </p>  
        </form>  
    </div>  
</body>
</html>
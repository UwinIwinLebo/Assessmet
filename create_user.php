<?php

  include_once('header.php');


  if(isset($_POST['create'])){
    $username = $_POST['username'];   
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $enabled = $_POST['enabled'];

    $exists = $database->isUserExist($username); 

    if(!$exists){ 
      $register = $database->userRegister($username, $password, $firstname, $surname, $enabled);  
      if($register > 0){  
        header("Location:users.php"); 
      }else{  
        echo "<script>alert('Unable to create user')</script>";  
      }  
    } else {  
      echo "<script>alert('Username already exist')</script>";  
    }
  }
?>

<!DOCTYPE HTML>
<html>
<head>
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>Deals | Create User</title>
	<link rel="stylesheet" type="text/css" href="css/styling.css">
</head>
<body>
	<form name="update" method="post" action="">
      <h1> Edit User </h1>
      <p>   
           	<label>First Name</label>  
            <input id="firstname" name="firstname" required="required" type="text" placeholder="" value=""/>  
  		</p>  
  		<p>   
            <label>Surname</label>  
            <input id="surname" name="surname" required="required" type="text" placeholder="" value=""/>  
  		</p>  
      <p>   
           	<label>Username</label>  
            <input id="username" name="username" required="required" type="text" placeholder="" value=""/>  
  		</p>
      <p>   
            <label>password </label>  
            <input id="password" name="password" required="required" type="password" placeholder=""/>  
      </p>
  		<p>   
           	<label>Enabled</label>  
            <select class="" id="enabled" name="enabled" required focus>
                <option value="t">True</option>
                <option value="f">False</option>
            </select>
  		</p>
        <p class="button">   
      	    <input type="submit" name="create" value="Save"/>   
        </p>  
    </form>
</body>
</html>
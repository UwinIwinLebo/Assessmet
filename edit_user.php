<?php
	include_once('header.php');

    if(isset($_GET['id'])){
		$user = $database->getUser($_GET['id']);
    }else{
    	header("Location:users.php");  
    }

    if(isset($_POST['update'])){
        $firstname = $_POST['firstname'];
        $surname  = $_POST['surname'];
        $username = $_POST['username'];   
        $enabled = $_POST['enabled'];
		$updated = $database->updateUser($_GET['id'], $firstname, $surname, $username, $enabled);
		if($updated){
			header("Location:users.php");  
		} else {
			echo "<script>alert('Update Not Successful')</script>";  
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
	<form name="update" method="post" action="">  
        <h1> Edit User </h1>
        <p>   
           	<label>First Name</label>  
            <input id="firstname" name="firstname" required="required" type="text" placeholder="" value="<?php echo $user['firstname']?>"/>  
  		</p>  
  		<p>   
            <label>Surame</label>  
            <input id="surname" name="surname" required="required" type="text" placeholder="" value="<?php echo $user['surname']?>"/>  
  		</p>  
        <p>   
           	<label>Username</label>  
            <input id="username" name="username" required="required" type="text" placeholder="" value="<?php echo $user['username']?>"/>  
  		</p>
  		<p>   
           	<label>Enabled</label>  
            <select class="" id="enabled" name="enabled" required focus>
                <option value="<?php echo $user['enabled'] ?>" disabled selected><?php echo ($user['enabled'] == 't' ? 'True' : 'False')?></option>
                <option value="t">True</option>
                <option value="f">False</option>
            </select>
  		</p>
        <p class="button">   
      	    <input type="submit" name="update" value="Update"/>   
        </p>  
    </form>
</body>
</html>
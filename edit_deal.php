<?php
	include_once('header.php');

    if(isset($_GET['id'])){
		  $deal = $database->getDeal($_GET['id']);
      $users = $database->getUsers();
    }else{
    	header("Location:deals.php");  
    }

    if(isset($_POST['update'])){
      $userId = $_POST['user'];
      $client = $_POST['client'];
      $value  = $_POST['value'];
      $date  = $_POST['date'];
		  $updated = $database->updateDeal($_GET['id'], $userId, $client, $value, $date);
  		if($updated){
  			header("Location:deals.php");  
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
        <h1> Edit Deal </h1>
        <p>   
           	<label>User</label>
            <select class="" id="user" name="user" required focus>
                <option value="<?php echo $deal['user_id'] ?>" selected><?php echo $users[$deal['user_id']]['firstname'].' '.$users[$deal['user_id']]['surname'] ?></option>

                <?php
                  foreach ($users as $key => $user) {
                    if($deal['user_id'] != $key){
                ?>
                      <option value="<?php echo $key ?>"><?php echo $user['firstname'].' '.$user['surname'] ?></option>
                <?php
                    }
                  }
                ?>
            </select>
  		</p>  
  		<p>   
            <label>Client</label>  
            <input id="client" name="client" required="required" type="text" placeholder="" value="<?php echo $deal['client']?>"/>  
  		</p>  
        <p>   
           	<label>Value(R)</label>  
            <input id="value" name="value" required="required" type="text" placeholder="" value="<?php echo $deal['value']?>"/>
  		</p>
  		<p>   
           	<label>Date</label>
            <input id="date" name="date" required="required" type="date" placeholder="" value="<?php echo $deal['date']?>"/>
  		</p>
        <p class="button">   
      	    <input type="submit" name="update" value="Update"/>   
        </p>  
    </form>
</body>
</html>
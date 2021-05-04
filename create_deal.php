<?php

  include_once('header.php');

  if(isset($_POST['create'])){

    $client = $_POST['client'];   
    $value = $_POST['value'];

    $created = $database->createDeal($client, $value, $_SESSION['uid']);  
    if($created > 0){  
      header("Location:deals.php"); 
    }else{  
      echo "<script>alert('Unable to create deal')</script>";  
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
      <h1> Create Deal </h1>
      <p>   
           	<label>Client</label>
            <input id="client" name="client" required="required" type="text" placeholder=""/>  
  		</p>  
  		<p>   
            <label>Value(R)</label>  
            <input id="value" name="value" required="required" type="number" step="0.01" placeholder=""/>  
  		</p>
      <p class="button">   
      	 <input type="submit" name="create" value="Save"/>   
      </p>  
    </form>
</body>
</html>
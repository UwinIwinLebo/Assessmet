<?php
	if(isset($_POST['process'])){
		$input = $_POST['xml'];
		$xml = simplexml_load_string($input);
		$row = '';

		if($xml){
			foreach ($xml as $k => $element) {
		   		$row .= $k.' : '.$element.'<br>';
			}
		} else {
			$row = 'Not a valid xml input';
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
    <div>
    	<form name="process" method="post" action="">
	       	<p class="">   
		       	<label>XML</label>
	    	</p>
	    	<p>
	    	    <textarea id="xml" name="xml" rows="4" cols="50">
				<?php
					if(isset($_POST['xml'])) {echo $_POST['xml'];}
				?>	    	    	
	    	    </textarea>
	        </p>
	        <p>
	      	    <input type="submit" name="process" value="Process"/>   
	        </p>
	    </form>
    </div>
    <div id="result">
    	<?php
    		if(isset($row)){
    			echo $row;
    		}
    	?>
    </div>
</body>
</html>
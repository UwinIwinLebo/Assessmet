<?php
    class Connect {  
        function connect() {  
            //include('constants.php'); 
			include('adodb/adodb.inc.php');
		    $db = ADONewConnection('postgres');
		    $db->debug = false;
		    $db->Connect('localhost', 'Boko', 'lemphane', 'uwin_iwin');

            return $db;  
        }  
        public function close(){  
        }  
    }  
?>
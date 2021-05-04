<?php  
    require_once 'connect.php';  
    session_start();  
    class database {  
            
        function __construct() {  
              
            // connecting to database  
            $con = new Connect();
            $this->db = $con->connect();
               
        }
        /**
        *Registers a user
        *parameters : username, password, firstname, surname, enabled
        */
        public function userRegister($username, $password, $firstname, $surname, $enabled = 't'){
            if ($enabled == 't'){
                $enabled = 1;
            } else {
                $enabled = 0;
            }

            $arr = array($username, md5($password), $firstname, $surname, $enabled);
            $result = $this->db->execute('insert into users ("strUsername", "strPassword", "strFirstName", "strSurname", "bEnabled") values (?,?,?,?,?) returning "ipkUserID"',$arr);
            $row = $result->fields;
            return $row['ipkUserID'];
        }

        /**
        *Checks whether  a username exists
        *parameter: username
        */
        public function isUserExist($username){  
            $arr = array($username);
            $result = $this->db->execute('select true as "exists" from users where "strUsername"=?',$arr);
            $row = $result->fields;

            return $row['exists'];
        }

        /**
        *Autrhenticate user
        */
        public function login($username, $password){ 

            $arr = array($username, md5($password));
            $result = $this->db->execute('select * from users where "strUsername"=? and "strPassword"=?',$arr);
            $row = $result->fields;

              
            if ($row != false){  
           
                $_SESSION['login'] = true;  
                $_SESSION['uid'] = $row['ipkUserID'];  
                $_SESSION['username'] = $row['strUsername'];  
                $_SESSION['firstname'] = $row['strFirstName'];
                $_SESSION['surname'] = $row['strSurname'];

                return true;  
            } else {  
                return false;  
            }
        }

        /**
        *Returns all users registered on the system
        */
        public function getUsers(){
            $users = array();
            $result = $this->db->execute('select * from users');
            foreach ($result as $key => $row) {
                $row = $result->fields;
                $users[$row['ipkUserID']]['username'] = $row['strUsername'];  
                $users[$row['ipkUserID']]['firstname'] = $row['strFirstName'];
                $users[$row['ipkUserID']]['surname'] = $row['strSurname'];
                $users[$row['ipkUserID']]['enabled'] = $row['bEnabled'];
            }
            return $users;

        }

        /**
        *Returns a specified user
        *parameter: user ID
        */
        public function getUser($userId){
            $arr = array($userId);
            $result = $this->db->execute('select * from users where "ipkUserID"=?',$arr);
            $row = $result->fields;
            $user = array(
                'username' => $row['strUsername'],
                'firstname' => $row['strFirstName'],
                'surname' => $row['strSurname'],
                'enabled' => $row['bEnabled']
            );
            return $user;
        }

        /**
        *update information of the specified user
        */
        public function updateUser($userId, $firstname, $surname, $username, $enabled){

            if ($enabled == 't'){
                $enabled = 1;
            } else {
                $enabled = 0;
            }
            $arr = array($firstname, $surname, $username, $enabled, $userId);
            $result = $this->db->execute('update users set "strFirstName"=?, "strSurname"=?, "strUsername"=?, "bEnabled"=? where "ipkUserID"=?',$arr);

            return TRUE;
        }

        /**
        *returns all deals on in the database
        */
        public function getDeals(){
            $deals = array();
            $result = $this->db->execute('select * from deals join users on (deals."iUserID" = users."ipkUserID")');
            foreach ($result as $key => $row) {
                $row = $result->fields;
                $deals[$row['ipkDealID']]['user'] = $row['strFirstName'].' '.$row['strSurname'];  
                $deals[$row['ipkDealID']]['client'] = $row['strClientName'];
                $deals[$row['ipkDealID']]['value'] = $row['fRandValue'];
                $deals[$row['ipkDealID']]['date'] = $row['dtTransactionDate'];
            }
            return $deals;
        }

        /**
        *creates a new deal for a specified user
        */
        public function createDeal($client, $value, $userId){
            $arr = array($userId, $client, $value, date("Y-m-d H:i:s"));
            $result = $this->db->execute('insert into deals ("iUserID", "strClientName", "fRandValue", "dtTransactionDate") values (?,?,?,?) returning "ipkDealID"',$arr);
            $row = $result->fields;
            return $row['ipkDealID'];
        }

        /**
        *returns information of a specified deal
        */
        public function getDeal($dealId){
            $arr = array($dealId);
            $result = $this->db->execute('select * from deals where "ipkDealID"=?',$arr);
            $row = $result->fields;
            $deal = array(
                'user_id' => $row['iUserID'],
                'client' => $row['strClientName'],
                'value' => $row['fRandValue'],
                'date' => $row['dtTransactionDate']
            );
            return $deal;
        }

        /**
        *updates information of a specified deal
        */
        public function updateDeal($dealId, $userId, $client, $value, $date){
            $arr = array($userId, $client, $value, $date, $dealId);
            $result = $this->db->execute('update deals set "iUserID"=?, "strClientName"=?, "fRandValue"=?, "dtTransactionDate"=? where "ipkDealID"=?',$arr);

            return TRUE;
        }

        public function logout(){
            // remove all variables  
            session_unset();   
      
            // destroy
            session_destroy();

            return 1;
        }
    }  
?> 
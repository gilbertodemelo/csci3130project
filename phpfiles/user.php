
<?php
    class User {

        //attributes
        public $username;
        public $password;
        public $totalpoints;
        public $accountID;
        public $friends = array();

        //constructor
        function __construct($username, $password, $totalpoints, $accountID, $friends){
            $this->username = $username;
            $this->password = $password;
            $this->totalpoints = $totalpoints;
            $this->accountID = $accountID;
            $this->friends = $friends;
        }

        //set methods
        function setTotalPoints($totalpoints){
             $this->totalpoints += $totalpoints;
        }

        function setAccountID($accountID){
            $this->accountID = $accountID;
        }

        function setUsername($username){
            $this->username = $username;
        }

        function setPassword($password){
            $this->password = $password;
        }

        function setFriends($friends){
            $this->friends = $friends;
        }

        //get methods
        function getTotalPoints(){
            echo $this->totalpoints;
        }

        function getAccountID(){
            echo $this->accountID;
        }

        function getUsername(){
            echo $this->username;
        }

        function getFriends(){
            for($i = 0; $i < friends.length; $i++){
                echo $this->friends[$i];
            }
        }

    } //end of class


?>
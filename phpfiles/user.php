
<?php
    class user{

        //attributes
        public $user;
        public $password;
        public $totalpoints;
        public $accountID;
        public $friends = array();

        //constructor
        function __construct($user, $password, $totalpoints, $accountID, $friends){
            $this->user = $user;
            $this->password = $password;
            $this->totalpoints = $totalpoints;
            $this->accountID = $accountID;
            $this->friends = $friends;
        }

        //set methods
        function setTotalPoints($totalpoints){
             $this->totalpoints = $totalpoints;
        }

        function setAccountID($accountID){
            $this->accountID = $accountID;
        }

        function setUser($user){
            $this->user = $user;
        }

        function setPassword($password){
            $this->password = $password;
        }

        function setFriends($friends){
            $this->friends = $friends;
        }
    }

?>
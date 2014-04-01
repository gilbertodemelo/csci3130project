<?php

    $connection = new mysqli('localhost', 'group14', 'group14', 'group14');

    if(mysqli_connect_errno()) {
        echo 'Error: Could not connect to database. Please try again later.';
        exit;
    }




    //Queries the latitude of the user in the database
    function getLatitude($username) {
       $latitude = "SELECT xlarge FROM group14.location WHERE ".$username." LIKE '%".$username."%' ";
        echo $latitude[0];
    }

    //Queries the longitude of the user in the database
    function getLongitude($username) {
        $longitude = "SELECT ylarge FROM group14.location WHERE ".$username." LIKE '%".$username."%' ";
        echo $longitude[0];
    }




?>
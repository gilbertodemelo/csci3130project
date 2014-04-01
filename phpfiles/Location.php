<?php


    if(mysqli_connect_errno()) {
        echo "Error: Could not connect to database. ";
        exit;
    }

    $lat = $_POST['latitude'];
    $long = $_POST['longitude'];

    if(!$lat || !$long) {
        echo "You have not entered all the required details. ";
        exit;
    }

    $connection = new mysqli('localhost', 'group14', 'group14', 'group14');

    if(mysqli_connect_errno()) {
        echo "Error: Could not connect to database. ";
        exit;
    }

    $minLatitudeQuery = "INSERT INTO group14.user WHERE VALUES '.$lat.' ";

    //$maxLatitudeQuery = "INSERT INTO group14.location.xlarge VALUES"

    $longitudeQuery = "INSERT INTO group14.location.where VALUES '.$long.'";

    $connection -> close();

?>
<<?php


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
    //inserts user's latitude into database
    $latitude = "INSERT INTO group14.user WHERE VALUES '.$x.' ";
    $result = $connection->query($latitude);

    //inserts user's longitude into database
    $longitude = "INSERT INTO group14.user VALUES '.$y.'";
    $result = $connection->query($longitude);

    if($result) {
        echo "Updated";
    } else {
        echo "not updated";
    }

    $connection -> close();

?>
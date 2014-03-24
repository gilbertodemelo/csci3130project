<?php


class Location {

    //attributes
    private $latitude;
    private $longitude;

    //constructor
    function __construct($latitude, $longitude){
        $this->latitude = $latitude;
        $this->longitude= $longitude;
    }

    //set methods
    function setLatitude($latitude){
        $this->latitude = $latitude;
    }

    function setLongitude($longitude){
        $this->longitude = $longitude;
    }

    //get methods
    function getLatitude(){

       echo "Latitude: ".$_GET['latitude'];

    }

    function getLongitude(){

        echo "Longitude: ".$_GET['longitude'];
    }

} //end of class

?>
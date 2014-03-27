<?php


class Character extends user {

    /** attributes */
    public $charaId;
    public $accountId;
    public $charaName;
    public $dailyPoints;
    public $picture; // character's picture (stored file name)

    /** constructor */
    function __construct($charaId, $accountId, $charaName, $dailyPoints, $picture){
        $this->charaId = $charaId;
        $this->accountId = $accountId;
        $this->charaName = $charaName;
        $this->dailyPoints = $dailyPoints;
        $this->picture = $picture;
    }

    /** set methods */
    function setCharaId($charaId){
        $this->charaId = $charaId;
    }

    function setAccountId($accountId){
        $this->accountId = $accountId;
    }

    function setCharaName($charaName){
        $this->charaName = $charaName;
    }

    function setDailyPoints($dailyPoints){
        $this->dailyPoints = $dailyPoints;
    }

    function setPicture($picture){
        $this->picture = $picture;
    }

    /** get methods */
    function getCharaId(){
        echo $this->charaId;
    }

    function getAccountId(){
        echo $this->accountId;
    }

    function getCharaName(){
        echo $this->charaName;
    }

    function getDailyPoints(){
        echo $this->dailyPoints;
    }

     function getPicture(){
        return $this->picture;
    }

    function __toString() {
        return 'Character [' . charaId . "Account ID: " . accountId . "Character Name: "
            . charaName . "Points Today: " . dailyPoints . + "Picture: " . picture . "]";
    }


} //end of class
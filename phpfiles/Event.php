<?php
/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 3/24/14
 * Time: 2:24 PM
 */

class Event extends Character{

    public $char1;
    public $char2;
    public $user1;
    public $user2;
    public $loc;

    function __construct($char1, $char2, $user1, $user2, $loc){
        $this->char1 = $char1;
        $this->char2 = $char2;
        $this->user1 = $user2;
        $this->user2 = $user2;
        $this->loc = $loc;
    }
    /**
     * @param mixed $char1
     */
    public function setChar1($char1)
    {
        $this->char1 = $char1;
    }

    /**
     * @return mixed
     */
    public function getChar1()
    {
        return $this->char1;
    }

    /**
     * @param mixed $char2
     */
    public function setChar2($char2)
    {
        $this->char2 = $char2;
    }

    /**
     * @return mixed
     */
    public function getChar2()
    {
        return $this->char2;
    }

    /**
     * @param mixed $user1
     */
    public function setUser1($user1)
    {
        $this->user1 = $user1;
    }

    /**
     * @return mixed
     */
    public function getUser1()
    {
        return $this->user1;
    }

    /**
     * @param mixed $user2
     */
    public function setUser2($user2)
    {
        $this->user2 = $user2;
    }

    /**
     * @return mixed
     */
    public function getUser2()
    {
        return $this->user2;
    }

    /**
     * @param mixed $loc
     */
    public function setLoc($loc)
    {
        $this->loc = $loc;
    }

    /**
     * @return mixed
     */
    public function getLoc()
    {
        return $this->loc;
    }

    public function __call($__toString){
        return $this->loc->$__toString();
    }

}
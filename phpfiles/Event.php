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
    /*
     * @return the event ID
     */
    public function meeting(){
        /*
         * This is a giant switch statement for all of the possible meetups between characters.
         * The event ID is returned.
         */
        switch($this->char1->getCharaID())
        {

            //first user is pikachu

            case 1:
                /*
                 * switch statement for the second user
                 */
                switch($this->char2->getCharaID())
                {

                    case 2:
                        return 1;
                        break;

                    case 3:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 2;
                                break;
                            case 1:
                                return 3;
                                break;
                            case 2:
                                return 4;
                                break;
                        }
                        break;

                    case 4:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 5;
                                break;
                            case 1:
                                return 6;
                                break;
                            case 2:
                                return 7;
                                break;
                        }
                        break;

                    case 5:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 8;
                                break;
                            case 1:
                                return 9;
                                break;
                            case 2:
                                return 10;
                                break;
                        }
                        break;

                    case 6:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 11;
                                break;
                            case 1:
                                return 12;
                                break;
                            case 2:
                                return 13;
                                break;
                        }
                        break;

                    case 7:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 14;
                                break;
                            case 1:
                                return 15;
                                break;
                            case 2:
                                return 16;
                                break;
                        }
                        break;

                    case 8:
                        switch(rand(0,1))
                        {
                            case 0:
                               return 18;
                                break;
                            case 1:
                                return 19;
                                break;
                        }
                        break;

                }
                break;

            //first user is reilly

            case 2:

                switch($this->char2->getCharaID())
                {
                    case 1:
                        return 19;
                        break;

                    case 3:
                        return 20;
                        break;

                    case 4:
                        return 21;
                        break;

                    case 5:
                        return 22;
                        break;

                    case 6:
                        return 23;
                        break;

                    case 7:
                        return 24;
                        break;

                    case 8:
                        return 25;
                        break;

                }
                break;

            //first user is dragon

            case 3:

                switch($this->char2->getCharaID())
                {
                    case 1:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 26;
                                break;
                            case 1:
                                return 27;
                                break;
                            case 2:
                                return 28;
                                break;
                        }
                        break;

                    case 2:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 29;
                                break;
                        }
                        break;

                    case 4:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 30;
                                break;
                            case 1:
                                return 31;
                                break;
                            case 2:
                                return 32;
                                break;
                        }
                        break;

                    case 5:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 33;
                                break;
                            case 1:
                                return 34;
                                break;
                            case 2:
                                return 35;
                                break;
                        }
                        break;

                    case 6:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 36;
                                break;
                            case 1:
                                return 37;
                                break;
                            case 2:
                                return 38;
                                break;
                        }
                        break;

                    case 7:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 39;
                                break;
                            case 1:
                                return 40;
                                break;
                            case 2:
                                return 41;
                                break;
                        }
                        break;

                    case 8:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 42;
                                break;
                            case 1:
                                return 43;
                                break;
                            case 2:
                                return 44;
                                break;
                        }
                        break;

                }
                break;

            //first user is shifty cow

            case 4:

                switch($this->char2->getCharaID())
                {
                    case 1:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 45;
                                break;
                            case 1:
                                return 46;
                                break;
                            case 2:
                                return 47;
                                break;
                        }
                        break;

                    case 3:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 48;
                                break;
                            case 1:
                                return 49;
                                break;
                            case 2:
                                return 50;
                                break;
                        }
                        break;

                    case 2:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 51;
                                break;
                        }
                        break;

                    case 5:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 52;
                                break;
                            case 1:
                                return 53;
                                break;
                            case 2:
                                return 54;
                                break;
                        }
                        break;

                    case 6:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 55;
                                break;
                            case 1:
                                return 56;
                                break;
                            case 2:
                                return 57;
                                break;
                        }
                        break;

                    case 7:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 58;
                                break;
                            case 1:
                                return 59;
                                break;
                            case 2:
                                return 60;
                                break;
                        }
                        break;

                    case 8:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 61;
                                break;
                            case 1:
                                return 62;
                                break;
                            case 2:
                                return 63;
                                break;
                        }
                        break;

                }
                break;

            //first user is eligible bachelor

            case 5:

                switch($this->char2->getCharaID())
                {
                    case 1:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 64;
                                break;
                            case 1:
                                return 65;
                                break;
                            case 2:
                                return 66;
                                break;
                        }
                        break;

                    case 3:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 67;
                                break;
                            case 1:
                                return 68;
                                break;
                            case 2:
                                return 69;
                                break;
                        }
                        break;

                    case 2:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 70;
                                break;
                        }
                        break;

                    case 4:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 71;
                                break;
                            case 1:
                                return 72;
                                break;
                            case 2:
                                return 73;
                                break;
                        }
                        break;

                    case 6:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 74;
                                break;
                            case 1:
                                return 75;
                                break;
                            case 2:
                                return 76;
                                break;
                        }
                        break;

                    case 7:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 77;
                                break;
                            case 1:
                                return 78;
                                break;
                            case 2:
                                return 79;
                                break;
                        }
                        break;

                    case 8:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 80;
                                break;
                            case 1:
                                return 81;
                                break;
                            case 2:
                                return 82;
                                break;
                        }
                        break;

                }
                break;

            //first user is upstanding citizen

            case 6:

                switch($this->char2->getCharaID())
                {
                    case 1:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 83;
                                break;
                            case 1:
                                return 84;
                                break;
                            case 2:
                                return 85;
                                break;
                        }
                        break;

                    case 3:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 86;
                                break;
                            case 1:
                                return 87;
                                break;
                            case 2:
                                return 88;
                                break;
                        }
                        break;

                    case 2:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 89;
                                break;
                        }
                        break;

                    case 5:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 90;
                                break;
                            case 1:
                                return 91;
                                break;
                            case 2:
                                return 92;
                                break;
                        }
                        break;

                    case 4:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 93;
                                break;
                            case 1:
                                return 94;
                                break;
                            case 2:
                                return 95;
                                break;
                        }
                        break;

                    case 7:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 96;
                                break;
                            case 1:
                                return 97;
                                break;
                            case 2:
                                return 98;
                                break;
                        }
                        break;

                    case 8:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 99;
                                break;
                            case 1:
                                return 100;
                                break;
                            case 2:
                                return 101;
                                break;
                        }
                        break;

                }
                break;

            //first user is crazy person

            case 7:

                switch($this->char2->getCharaID())
                {
                    case 1:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 102;
                                break;
                            case 1:
                                return 103;
                                break;
                            case 2:
                                return 104;
                                break;
                        }
                        break;

                    case 3:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 105;
                                break;
                            case 1:
                                return 106;
                                break;
                            case 2:
                                return 107;
                                break;
                        }
                        break;

                    case 2:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 108;
                                break;
                        }
                        break;

                    case 5:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 109;
                                break;
                            case 1:
                                return 110;
                                break;
                            case 2:
                                return 111;
                                break;
                        }
                        break;

                    case 6:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 112;
                                break;
                            case 1:
                                return 113;
                                break;
                            case 2:
                                return 114;
                                break;
                        }
                        break;

                    case 4:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 115;
                                break;
                            case 1:
                                return 116;
                                break;
                            case 2:
                                return 117;
                                break;
                        }
                        break;

                    case 8:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 118;
                                break;
                            case 1:
                                return 119;
                                break;
                            case 2:
                                return 120;
                                break;
                        }
                        break;

                }
                break;

            //first user is wretched man

            case 8:

                switch($this->char2->getCharaID())
                {
                    case 1:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 121;
                                break;
                            case 1:
                                return 122;
                                break;
                            case 2:
                                return 123;
                                break;
                        }
                        break;

                    case 3:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 124;
                                break;
                            case 1:
                                return 125;
                                break;
                            case 2:
                                return 126;
                                break;
                        }
                        break;

                    case 2:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 127;
                                break;
                        }
                        break;

                    case 5:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 128;
                                break;
                            case 1:
                                return 129;
                                break;
                            case 2:
                                return 130;
                                break;
                        }
                        break;

                    case 6:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 131;
                                break;
                            case 1:
                                return 132;
                                break;
                            case 2:
                                return 133;
                                break;
                        }
                        break;

                    case 7:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 134;
                                break;
                            case 1:
                                return 135;
                                break;
                            case 2:
                                return 136;
                                break;
                        }
                        break;

                    case 4:
                        switch(rand(0,2))
                        {
                            case 0:
                                return 137;
                                break;
                            case 1:
                                return 138;
                                break;
                            case 2:
                                return 139;
                                break;
                        }
                        break;

                }
                break;
        }
    }
}
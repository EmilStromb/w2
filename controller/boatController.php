<?php

    function addBoat(boat $b) {
        // __wakeup is called by unserialize(). A wakeup method should take the unserialized values.
        $m = unserialize($_SESSION['member']);
        // Get boat type and length.
        $type =  $_POST["AddBoat::type"];
        $length =  $_POST["AddBoat::length"];
                
        // Set type and lenght on boat.
        $b->setBoatType($type);
        $b->setBoatLength($length);
        $b->setBoatmemberID($m->getMemberID());

        // __sleep is called by serialize(). A sleep method will return an array of the values from the object. https://stackoverflow.com/questions/1442177/storing-objects-in-php-session
        $_SESSION['boat'] = serialize($b);
    }

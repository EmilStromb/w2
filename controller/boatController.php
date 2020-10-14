<?php

class BoatController {

// Change to class file!
    public function addBoat(boat $b) {
        // __wakeup is called by unserialize(). A wakeup method should take the unserialized values.
        $m = unserialize($_SESSION['member']);
        // Get boat type and length.
        $type =  $_POST["AddBoat::type"];
        $length =  $_POST["AddBoat::length"];
                
        // Set type and lenght on boat.
        $b->setBoatType($type);
        $b->setBoatLength($length);
        $b->setBoatmemberID($m->getMemberID());

        $this->saveToFileBoat($b, $m);

        // __sleep is called by serialize(). A sleep method will return an array of the values from the object. https://stackoverflow.com/questions/1442177/storing-objects-in-php-session
        $_SESSION['boat'] = serialize($b);
    }

    // Save the info to Boats.txt
    private function saveToFileBoat(boat $b, member $m) {
        $file = fopen('boats.txt', 'a');
        fwrite($file, $b->getBoatType() . ",");
        fwrite($file, $b->getBoatLength() . ",");
        fwrite($file, $m->getMemberID() . "\n");
        fclose($file);
    }
}

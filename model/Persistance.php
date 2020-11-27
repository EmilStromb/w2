<?php

class Persistance {

    private $memberFile = "members.txt";
    private $boatFile = "boats.txt";

    public function addMember(member $m, AddMember $am) {
        // Get posted name and personalnumber.
        $name =  $am->getFullName();
        $personalNumber = $am->getPersonalNumber();
        
        // Get random and unique ID.
        $count = 1;
        foreach (file($memberFile) as $line) {
            $data = explode(',', $line);
            if ($count <= $data[2]) {
                $count = (int)$data[2];
                $count++;
            }  
        }
        $count;

        // Set the information in a new model.
        $m->setMemberName($name);
        $m->setPersonalNumber($personalNumber);
        $m->setMemberID($count);

        $this->saveToFileMember($m);   
    }

    public function updateMember(member $m) {
        $this->saveToFileMember($m);
    }

    public function addBoat(boat $b, addBoat $ab) {
        // Get boat type and length.
        $type = $ab->getBoatType();
        $length = $ab->getBoatLength();
                
        // Set type and lenght on boat.
        $b->setBoatType($type);
        $b->setBoatLength($length);

        $this->saveToFileBoat($b);
    }

    public function updateBoat(boat $b) {
        $this->saveToFileBoat($b);
    }

    public function saveToFileMember(member $m) {
        $file = fopen($memberFile, 'a');
        fwrite($file, $m->getMemberName() . ",");
        fwrite($file, $m->getPersonalNumber() . ",");
        fwrite($file, $m->getMemberID() . "\n");
        fclose($file);
    }

    private function saveToFileBoat(boat $b) {
        $file = fopen($boatFile, 'a');
        fwrite($file, $b->getBoatType() . ",");
        fwrite($file, $b->getBoatLength() . "\n");
        fclose($file);
    }
    
    public function removeFromFile($file, $ID) {
        $lineCount = 0;
        foreach (file($file) as $line) {
            $data = explode(',', $line);
            // Check so the ID of user matches
            if ($data[2] === $ID . "\n")  {
                $this->deleteFromFile($file, $lineCount);
                return;
            }
            $lineCount ++;
        }
    }

    public function removeFromFileBoat($file, $type, $length) {
        $lineCount = 0;
        foreach (file($file) as $line) {
            $data = explode(',', $line);
            if ($data[0] == $type && $data[1] == $length . "\n")  {
                $this->deleteFromFile($file, $lineCount);
                return;
            }
            $lineCount ++;
        }
    }

    private function deleteFromFile($file, $lineCount) {
        // Read the whole file
        $file_out = file($file); 
        //Delete the recorded line
        unset($file_out[$lineCount]);
        //Recorded in a file
        file_put_contents($file, implode("", $file_out));
    }    
} 
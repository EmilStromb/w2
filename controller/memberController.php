<?php
require_once('model/member.php');

class MemberController {

// Change to class file!
    public function addMember(member $m) {
        // Get posted name and personalnumber.
        $name =  $_POST["addMember::fullName"];
        $personalNumber = $_POST["addMember::personalNumber"];

        // Get random and unique ID.
        $bytes = random_bytes(5);
        $ID = bin2hex($bytes);

        // Set the information in a new model.
        $m->setMemberName($name);
        $m->setPersonalNumber($personalNumber);
        $m->setMemberID($ID);
        
        // __sleep is called by serialize(). A sleep method will return an array of the values from the object. https://stackoverflow.com/questions/1442177/storing-objects-in-php-session
        $_SESSION['member'] = serialize($m);

        $this->saveTofile($m);   
    }

    public function updateMember($name, $personalNumber, $ID) {
        $m = new member();

        $m->setMemberName($name);
        $m->setPersonalNumber($personalNumber);
        $m->setMemberID($ID);

        $this->saveTofile($m);
    }

    // Save the info to members.txt
    private function saveToFile(member $m) {
        $file = fopen('members.txt', 'a');
        fwrite($file, $m->getMemberName() . ",");
        fwrite($file, $m->getPersonalNumber() . ",");
        fwrite($file, $m->getMemberID() . "\n");
        fclose($file);
    }
} 

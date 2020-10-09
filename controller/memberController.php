<?php

    function addMember(member $m) {
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


        // TODO:
        // change this to a new function
        $file = fopen('member.txt', 'a');
        fwrite($file, $m->getMemberName() . ", ");
        fwrite($file, $m->getPersonalNumber() . ", ");
        fwrite($file, $m->getMemberID() . "\n");
        fclose($file);

        /* will use later to read line by line.
        foreach (readLines($file) as $line) {
            echo $line;
        }*/ 
        
    }
    // Function to Read txt file line by line help from https://stackoverflow.com/questions/13246597/how-to-read-a-large-file-line-by-line
    function readLines($file) {
        $file = fopen('member.txt', 'r');

        while (($line = fgets($file)) !== false) {
            yield $line;
        }
    
        fclose($file);
    }

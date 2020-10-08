<?php

    function addMember(member $m) {
        // Get posted name and personalnumber.
        $name =  $_POST["addMember::fullName"];
        $personalNumber = $_POST["addMember::personalNumber"];

        // Get random and unique ID.
        $bytes = random_bytes(10);
        $ID = bin2hex($bytes);

        // Set the information in a new model.
        $m->setMemberName($name);
        $m->setPersonalNumber($personalNumber);
        $m->setMemberID($ID);
        return $m;
        echo $m->getMemberName();
        echo $m->getPersonalNumber();
    }

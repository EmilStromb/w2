<?php

    function addBoat(member $m) {
        $type =  $_POST["AddBoat::type"];
        $length =  $_POST["AddBoat::length"];
        $personalNumber = $m->getPersonalNumber();
        $ID = $m->getMemberID();
        echo $type;
        echo $length;
        echo $personalNumber;
        echo $ID;
    }

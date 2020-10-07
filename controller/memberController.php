<?php

    function addMember() {

        $name =  $_POST["addMember::fullName"];
        $personalNumber = $_POST["addMember::personalNumber"];
        $bytes = random_bytes(10);
        $ID = bin2hex($bytes);
        echo $name;
        echo $personalNumber;
    }

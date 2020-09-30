<?php

class member {

    private $name;
    private $personalNumber;
    private $memberID;

    public function getMemberName() {
        return $this->name;
    }

    public function setMemberName($name) {
        $this->name = $name;
    }

    public function getPersonalNumber() {
        return $this->personalNumber;
    }

    public function setPersonalNumber($personalNumber) {
        $this->personalNumber = $personalNumber;
    }

    public function getMemberID() {
        return $this->memberID;
    }

    public function setMemberID($id) {
        $this->memberID = $id;
    }
}
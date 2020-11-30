<?php

class Member {

    private $name;
    private $personalNumber;
    private $memberID;
    private $boats = Array();

    public function Set($name, $personalNumber, $memberID) {
        $this->name = $name;
        $this->personalNumber = $personalNumber;
        $this->memberID = $memberID;
    }

    public function getMemberName() {
        return $this->name;
    }

    public function addBoat(boat $boat) {
        array_push($this->boats, $boat);
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

    public function setMemberID($memberID) {
        $this->memberID = $memberID;
    }

    public function getBoats() {
        return $this->boats;
    }
}
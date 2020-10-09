<?php

class Boat {
    private $type;
    private $length;
    private $memberID;


    public function getBoatType() {
        return $this->type;
    }

    public function setBoatType($type) {
        if ($type == "Sailboat" || $type == "Motorsailer" || $type == "kayak/Canoe" || $type == "Other") {
            $this->type = $type;
        }
    }

    public function getBoatMemberID() {
        return $this->memberID;

    }

    public function setBoatMemberID($memberID) {
        $this->memberID = $memberID;

    }

    public function getBoatLength() {
        return $this->length;

    }

    public function setBoatLength($length) {
        $this->length = $length;

    }
}
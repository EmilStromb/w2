<?php

class Boat {
    private $type;
    private $length;

    public function Set($type, $length) {
        $this->type = $type;
        $this->length = $length;

    }

    public function getBoatType() {
        return $this->type;
    }

    public function setBoatType($type) {
        if ($type == "Sailboat" || $type == "Motorsailer" || $type == "kayak/Canoe" || $type == "Other") {
            $this->type = $type;
        }
    }

    public function getBoatLength() {
        return $this->length;

    }

    public function setBoatLength($length) {
        $this->length = $length;

    }
}
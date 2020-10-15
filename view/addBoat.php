<?php

class AddBoat{

  private $submitBtn = "AddBoat::submit";
  private $type = "AddBoat::type";
  private $length = "AddBoat::length";

  public function show(){
    return '
    <h3>Add a boat<h3>
    <form method="POST">
    <legend>Length
      <input type="text" name="' . $this->length . '" size=3>
    </legend>
    <legend>Type
      <input type="radio" name="' . $this->type . '" value="Sailboat">Sailboat</input>
      <input type="radio" name="' . $this->type . '" value="Motorsailer">Motorsailer</input>
      <input type="radio" name="' . $this->type . '" value="kayak/Canoe">Kayak/Canoe</input>
      <input type="radio" name="' . $this->type . '" value="Other">Other</input>
    </legend>
    <input type="submit" name="' . $this->submitBtn . '" value="Send">
    </form>s';
  }

  public function getBoatLength() {
    return $_POST[$this->length];
  }

  public function getBoatType() {
    return $_POST[$this->type];
  }

  public function getSendBtn() {
    return isset($_POST[$this->submitBtn]);
  }
}
<?php

class AddMember{
  private $sendBtn = "addMember::button";
  private $name = "addMember::fullName";
  private $personalNumber = "addMember::personalNumber";

  public function show(){
    return '
    <h3>Add a member<h3>
    <form method="POST">
    <legend>Full name
      <input type="text" name="' . $this->name . '">
    </legend>
    <legend>Personal identity number
      <input type="text" name="' . $this->personalNumber . '">
    </legend>
    <input type="submit" name="' . $this->sendBtn . '" value="Send">
    </form>';
  }

  public function getFullName() {
    return $_POST[$this->name];
  }
  public function getPersonalNumber() {
    return $_POST[$this->personalNumber];
  }
  public function getSendBtn() {
    return isset($_POST[$this->sendBtn]);
  }
}
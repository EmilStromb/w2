<?php

class RenderMember{

  private $ID;
  private $fullName;
  private $personalNumber;
  private $changeBtn = "RenderMember::change";
  private $update = "RenderMember::update";
  private $myName = "RenderMember::fullName";
  private $myPersonalNumber = "RenderMember::personalNumber";
  private $myID = "RenderMember::ID";


  public function __construct($fullName, $personalNumber, $ID){
    $this->ID = $ID;
    $this->fullName = $fullName;
    $this->personalNumber = $personalNumber;
  }

  // Update member form
  public function show(){
    return '
    <form method="POST">
    <legend>Full name:
      <input name="' . $this->myName . '" value="' . $this->fullName . '" />
    </legend>
    <legend>Personal identity number:
      <input name="' . $this->myPersonalNumber . '" value="' . $this->personalNumber . '" />
    </legend>
    <legend>member ID:
      <input name="' . $this->myID . '" value="' . $this->ID . '" readonly/>
    </legend>
    <input type="submit" name="' . $this->update . '" value="Update member"/>
    <input type="submit" name="' . $this->update . '" value="Delete member"/>
    </form>';
  }
  // For lists.
  public function render(){  // fix here to get info to change member info.
    return '
    <hr>
    <form method="POST">
    <legend>Full name:
      <input name="' . $this->myName . '" value="' . $this->fullName . '" readonly/>
    </legend>
    <legend>Personal identity number:
      <input name="' . $this->myPersonalNumber . '" value="' . $this->personalNumber . '" readonly/>
    </legend>
    <legend>member ID:
      <input name="' . $this->myID . '" value="' . $this->ID . '" readonly/>
    </legend>
    <input type="submit" name="' . $this->changeBtn . '" value="update"/>
    </form>';
  }
  public function getID() {
    return $_POST[$this->myID];
  }
  public function getPersonalNumber() {
    return $_POST[$this->myPersonalNumber];
  }
  public function getName() {
    return $_POST[$this->myName];
  }
  public function getSendBtn() {
    return isset($_POST[$this->changeBtn]);
  }
  public function getUpdateSendBtn() {
    return isset($_POST[$this->update]);
  }
  public function getUpdateBtnValue() {
    return $_POST[$this->update];
  }
}
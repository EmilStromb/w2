<?php

class RenderBoat{

  private $ID;
  private $length;
  private $type;
  private $myType = "RenderBoat::type";
  private $myLength = "RenderBoat::length";
  private $myID = "RenderBoat::ID";
  private $changeBtn = "RenderBoat::change";
  private $update = "RenderBoat::update";


  


  public function __construct($type, $length , $ID){
    $this->ID = $ID;
    $this->length = $length;
    $this->type = $type;
  }

  // Update member form
  public function show(){
    return '
    <form method="POST">
    <legend>length:
      <input name="' . $this->myLength . '" value="' . $this->length . '"/>
    </legend>
    <legend>type:
    <input name="' . $this->myType . '" value="' . $this->type . '"/>
      </legend>
    <legend>member ID:
      <input name="' . $this->myID . '" value="' . $this->ID . '" readonly/>
    </legend>
    <input type="submit" name="' . $this->update . '" value="Update boat"/>
    <input type="submit" name="' . $this->update . '" value="Delete boat"/>
    </form>';
  }
  // For lists.
  public function render(){ // fix here to get info to change boat info.
    return '
    <hr>
    <form method="POST">
    <legend>length:
      <input name="' . $this->myLength . '" value="' . $this->length . '" readonly/>
    </legend>
    <legend>type:
    <input name="' . $this->myType . '" value="' . $this->type . '" readonly/>
      </legend>
    <legend>member ID:
      <input name="' . $this->myID . '" value="' . $this->ID . '" readonly/>
    </legend>
    <input type="submit" name="' . $this->changeBtn . '" value="update"/>
    </form>';
  }
  public function renderAmout($amount) {
    return '
    <hr>
    <h3>Amount of boats: </h3>
    <p> ' . $amount . ' <p>
    ';
  }
  public function getID() {
    return $_POST[$this->myID];
  }
  public function getType() {
    return $_POST[$this->myType];
  }
  public function getLength() {
    return $_POST[$this->myLength];
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
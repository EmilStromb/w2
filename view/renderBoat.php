<?php

class RenderBoat{

  private $length;
  private $type;
  private $myType = "RenderBoat::type";
  private $myLength = "RenderBoat::length";
  private $myOldType = "RenderBoat::oldtype";
  private $myOldLength = "RenderBoat::oldlength";
  private $changeBtn = "RenderBoat::change";
  private $updateBtn = "RenderBoat::update";

  public function __construct(boat $b) {
    $this->length = $b->getBoatLength();
    $this->type = $b->getBoatType();
  }

  // Update member form
  public function show(){
    return '

    <form method="POST">
    <legend>length:
      <input name="' . $this->myLength . '" value="' . $this->length . '"/>
      <input name="' . $this->myOldLength . '" value="' . $this->length . '"hidden/>
    </legend>
    
    <legend>type:
    <input name="' . $this->myType . '" value="' . $this->type . '"/>
    <input name="' . $this->myOldType . '" value="' . $this->type . '"hidden/>
    </legend>

    <input type="submit" name="' . $this->updateBtn . '" value="Update boat"/>
    <input type="submit" name="' . $this->updateBtn . '" value="Delete boat"/>
    </form>';
  }
  // For lists.
  public function render(){ 
    return '
    <hr>
    <form method="POST">
    <legend>length:
      <input name="' . $this->myLength . '" value="' . $this->length . '" readonly/>
    </legend>
    <legend>type:
    <input name="' . $this->myType . '" value="' . $this->type . '" readonly/>
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

  public function getOldType() {
    return $_POST[$this->myOldType];
  }
  public function getOldLength() {
    return $_POST[$this->myOldLength];
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
    return isset($_POST[$this->updateBtn]);
  }
  public function getUpdateBtnValue() {
    return $_POST[$this->updateBtn];
  }
}
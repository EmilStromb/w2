<?php

class RenderBoat{

  private $ID;
  private $length;
  private $type;
  private static $myType = "RenderBoat::type";
  private static $myLength = "RenderBoat::length";
  private static $myID = "RenderBoat::ID";
  private static $changeBtn = "RenderBoat::change";

  


  public function __construct($type, $length , $ID){
    $this->ID = $ID;
    $this->length = $length;
    $this->type = $type;
  }

  // Update member form
  public function show(){
    return '
    <form method="POST">
    <legend>length
      <input type="text"  value=' . $this->length . '>
    </legend>
    <legend>type
      <input type="text"  value=' . $this->type . '>
    </legend>
    <legend>Member ID
      <input type="text"  value=' . $this->ID . '>
    </legend>
    <input type="submit" name="UpdateMember" value="update member"/>
    <input type="submit" name="UpdateMember" value="Delete member"/>
    </form>';
  }
  // For lists.
  public function render(){ // fix here to get info to change boat info.
    return '
    <hr>
    <form method="POST">
    <legend>length:
      <input name="' . self::$myLength . '" value="' . $this->length . '" readonly/>
    </legend>
    <legend>type:
    <input name="' . self::$myType . '" value="' . $this->type . '" readonly/>
      </legend>
    <legend>member ID:
      <input name="' . self::$myID . '" value="' . $this->ID . '" readonly/>
    </legend>
    <input type="submit" name="' . self::$changeBtn . '" value="update"/>
    </form>';
  }
  public function renderAmout($amount) {
    return '
    <hr>
    <h3>Amount of boats: </h3>
    <p> ' . $amount . ' <p>
    ';
  }
}
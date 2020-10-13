<?php

class RenderMember{

  private $ID;
  private $fullName;
  private $personalNumber;
  private static $changeBtn = "RenderMember::change";
  private static $myName = "RenderMember::fullName";
  private static $myPersonalNumber = "RenderMember::personalNumber";
  private static $myID = "RenderMember::ID";


  public function __construct($fullName, $personalNumber, $ID){
    $this->ID = $ID;
    $this->fullName = $fullName;
    $this->personalNumber = $personalNumber;
  }

  // Update member form
  public function show(){
    return '
    <form method="POST">
    <legend>Full name
      <input type="text" value=' . $this->fullName . '>
    </legend>
    <legend>Personal identity number
      <input type="text"  value=' . $this->personalNumber . '>
    </legend>
    <legend>Member ID
      <input type="text"  value=' . $this->ID . '>
    </legend>
    <input type="submit" name="UpdateMember" value="update member"/>
    <input type="submit" name="UpdateMember" value="Delete member"/>
    </form>';
  }
  // For lists.
  public function render(){  // fix here to get info to change member info.
    return '
    <hr>
    <form method="POST">
    <legend>Full name:
      <input name="' . self::$myName . '" value="' . $this->fullName . '" readonly/>
    </legend>
    <legend>Personal identity number:
      <input name="' . self::$myPersonalNumber . '" value="' . $this->personalNumber . '" readonly/>
    </legend>
    <legend>member ID:
      <input name="' . self::$myID . '" value="' . $this->ID . '" readonly/>
    </legend>
    <input type="submit" name="' . self::$changeBtn . '" value="update"/>
    </form>';
  }
}
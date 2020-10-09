<?php

class UpdateMember{

  private $ID;
  private $firstname;
  private $lastname;
  private $personalNumber;

  public function __construct($ID, $fullName, $personalNumber){
    $this->ID = $ID;
    $this->fullName = $fullName;
    $this->personalNumber = $personalNumber;
    $this->boats = $boats;
  }

  public function show(){
    return '
    <form method="POST">
    <legend>Full name
      <input type="text" name="firstname" value=' . $this->fullName . '>
    </legend>
    <legend>Personal identity number
      <input type="text" name="personalNumber" value=' . $this->$personalNumber . '>
    </legend>
    <input type="submit" name="UpdateMember" value="Delete member"/>
    ';
  }

}
<?php

class renderMember{

  private $ID;
  private $fullName;
  private $personalNumber;

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
      <input type="text" name="firstname" value=' . $this->fullName . '>
    </legend>
    <legend>Personal identity number
      <input type="text" name="personalNumber" value=' . $this->$personalNumber . '>
    </legend>
    <legend>Member ID
      <input type="text" name="ID" value=' . $this->$ID . '>
    </legend>
    <input type="submit" name="UpdateMember" value="Delete member"/>
    ';
  }
  // For lists.
  public function render(){
    return '
    <hr>
    <form method="POST">
    <legend>Full name:
      <p>' . $this->fullName . '<p>
    </legend>
    <legend>Personal identity number:
      <p>' . $this->personalNumber . '<p>
    </legend>
    <legend>member ID:
      <p>' . $this->ID . '<p>
    </legend>
    <input type="submit" name="UpdateMember" value="change"/>
    ';
  }
}
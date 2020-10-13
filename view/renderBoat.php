<?php

class renderBoat{

  private $ID;
  private $length;
  private $type;

  public function __construct($type,$length , $ID){
    $this->ID = $ID;
    $this->length = $length;
    $this->type = $type;
  }

  // Update member form
  public function show(){
    return '
    <form method="POST">
    <legend>length
      <input type="text" name="firstname" value=' . $this->length . '>
    </legend>
    <legend>type
      <input type="text" name="personalNumber" value=' . $this->$type . '>
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
    <legend>length:
      <p>' . $this->length . '<p>
    </legend>
    <legend>type:
      <p>' . $this->type . '<p>
    </legend>
    <legend>member ID:
      <p>' . $this->ID . '<p>
    </legend>
    <input type="submit" name="UpdateMember" value="change"/>
    ';
  }
  public function renderAmout($amount) {
    return '
    <hr>
    <h2>Amount of boats: </h2>
    <p> ' . $amount . ' <p>
    ';
  }
}
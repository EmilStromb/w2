<?php

class AddBoat{

  private $memberId;

  public function show(){
    return '
    <h3>Add a boat<h3>
    <form action="?action=addBoat" method="POST">
    <input type="hidden" name="memberId" value=' . $this->memberId . '>
    <legend>Length
      <input type="text" name="length" size=3>
    </legend>
    <legend>Type
      <input type="radio" name="type" value="Sailboat">Sailboat</input>
      <input type="radio" name="type" value="Motorsailer">Motorsailer</input>
      <input type="radio" name="type" value="kayak/Canoe">Kayak/Canoe</input>
      <input type="radio" name="type" value="Other">Other</input>
    </legend>
    <legend>Personal identity number
      <input type="text" name="personalNumber">
    </legend>
    <input type="submit" name="RegisterMember" value="Send">
    ';
  }
}
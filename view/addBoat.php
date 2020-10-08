<?php

class AddBoat{

  private static $sendbtn = "AddBoat::button";
  private static $type = "AddBoat::type";
  private static $length = "AddBoat::length";
  private static $personalNumber = "AddBoat::personalNumber";

  public function show(){
    return '
    <h3>Add a boat<h3>
    <form action="?action=addBoat" method="POST">
    <legend>Length
      <input type="text" name="' . self::$length . '" size=3>
    </legend>
    <legend>Type
      <input type="radio" name="' . self::$type . '" value="Sailboat">Sailboat</input>
      <input type="radio" name="' . self::$type . '" value="Motorsailer">Motorsailer</input>
      <input type="radio" name="' . self::$type . '" value="kayak/Canoe">Kayak/Canoe</input>
      <input type="radio" name="' . self::$type . '" value="Other">Other</input>
    </legend>
    <input type="submit" name="' . self::$sendbtn . '" value="Send">
    ';
  }
}
<?php

class AddMember{
  private static $sendBtn = "addMember::button";
  private static $name = "addMember::fullName";
  private static $personalNumber = "addMember::personalNumber";

  public function show(){
    return '
    <h3>Add a member<h3>
    <form method="POST">
    <legend>Full name
      <input type="text" name="' . self::$name . '">
    </legend>
    <legend>Personal identity number
      <input type="text" name="' . self::$personalNumber . '">
    </legend>
    <input type="submit" name="' . self::$sendBtn . '" value="Send">
    </form>';
  }
}
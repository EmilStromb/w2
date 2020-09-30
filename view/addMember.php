<?php

class addMember{

  public function show(){
    return '
    <h3>Add a member<h3>
    <form method="POST">
    <legend>Full name
      <input type="text" name="fullName">
    </legend>
    <legend>Personal identity number
      <input type="text" name="personalNumber">
    </legend>
    <input type="submit" name="RegisterMember" value="Send">
    ';
  }
}
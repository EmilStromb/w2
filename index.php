<?php

require_once('model/boat.php');
require_once("view/view.php");
require_once("view/addMember.php");
require_once("view/addBoat.php");
require_once("controller/memberController.php");
require_once("controller/boatController.php");
require_once("view/emptyView.php");
require_once('model/member.php');

session_start();

$m = new member();
$am = new addMember();
$ab = new addBoat();
$v = new view();
$b = new boat();
$ev = new emptyView();

// If addMember  send button is pressed.
if (isset($_POST['addMember::button'])) {
    addMember($m);
    $v->render($ab);
    // __sleep is called by serialize(). A sleep method will return an array of the values from the object. https://stackoverflow.com/questions/1442177/storing-objects-in-php-session
    $_SESSION['member'] = serialize($m);
} else {
// Nav
if (isset($_POST['view::NewMember'])) {
    $v->render($am);
} else {
    $v->render($ev);
}
}
// If addboat send button is pressed.
if (isset($_POST['AddBoat::button'])) {
    // __wakeup is called by unserialize(). A wakeup method should take the unserialized values.
    $member = unserialize($_SESSION['member']);
    addBoat($member);
}
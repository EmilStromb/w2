<?php

require_once('model/boat.php');
require_once("view/view.php");
require_once("view/addMember.php");
require_once("view/addBoat.php");
require_once("controller/memberController.php");
require_once("controller/boatController.php");
require_once("controller/listController.php");
require_once("view/emptyView.php");
require_once('model/member.php');

session_start();

$m = new Member();
$am = new AddMember();
$ab = new AddBoat();
$v = new View();
$b = new Boat();
$ev = new EmptyView();
$vc = new verboseController();

// If addMember 'send' button is pressed.
if (isset($_POST['addMember::button'])) {
    // check so there is content in inputs.
    if ($_POST['addMember::fullName'] == '' || $_POST['addMember::personalNumber'] == '') {
        $v->render($am);
    } else {
    addMember($m);
    $v->render($ab);
    }
} else {
// Nav
if (isset($_POST['view::NewMember'])) {
    $v->render($am);
} else if (isset($_POST['view::VerboseList'])) {
    $v->render($vc);
} else if (isset($_POST['view::CompactList'])) {
    $v->render($ev);
    echo "CompactList";
} else {
    $v->render($ev);
}
}
// If addboat 'send' button is pressed.
if (isset($_POST['AddBoat::button'])) {
    addBoat($b);
}
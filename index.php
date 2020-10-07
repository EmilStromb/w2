<?php
require_once('model/member.php');
require_once('model/boat.php');
require_once("view/view.php");
require_once("view/addMember.php");
require_once("view/addBoat.php");
require_once("controller/memberController.php");
require_once("controller/boatController.php");
require_once("view/emptyView.php");

$am = new addMember();
$ab = new addBoat();
$v = new view();
$m = new member();
$b = new boat();
$ev = new emptyView();

// If send button is pressed in new member.
if (isset($_POST['addMember::button'])) {
    addMember();
    $v->render($ab);
} else {
// Nav
if (isset($_POST['view::NewMember'])) {
    $v->render($am);
} else {
    $v->render($ev);
}
}
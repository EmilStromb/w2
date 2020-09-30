<?php
require_once('model/member.php');
require_once('model/boat.php');
require_once("view/view.php");
require_once("view/addMember.php");
require_once("view/addBoat.php");

$am = new addMember();
$ab = new addBoat();
$v = new view();
$m = new member();
$b = new boat();

// Move this to controller mby?
if (isset($_POST['view::NewMember'])) {
    $v->render($am);
} else {
    $v->render($ab);
}
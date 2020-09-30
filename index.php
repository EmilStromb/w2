<?php
require_once('model/member.php');
require_once('model/boat.php');
require_once("view/view.php");

$v = new view();
$m = new member();
$b = new boat();

$v->render();
// Move this to controller mby?
if (isset($_POST['view::NewMember'])) {
    echo "Hello";
}
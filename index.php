<?php

require_once('model/boat.php');
require_once("view/view.php");
require_once("view/addMember.php");
require_once("view/addBoat.php");
require_once("controller/memberController.php");
require_once("controller/boatController.php");
require_once("controller/verboseListController.php");
require_once("controller/compactListController.php");
require_once("controller/navigationController.php");
require_once("view/emptyView.php");
require_once('model/member.php');

session_start();

$m = new Member();
$am = new AddMember();
$ab = new AddBoat();
$v = new View();
$b = new Boat();
$ev = new EmptyView();
$vlc = new VerboseController();
$clc = new CompactController();

$nc = new NavController($v);

$nc->showView($v, $m, $am, $ab, $b, $ev, $vlc, $clc);

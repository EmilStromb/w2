<?php

require_once('model/boat.php');
require_once('model/member.php');
require_once('model/persistance.php');
require_once("view/renderBoat.php");
require_once("view/renderMember.php");
require_once("view/view.php");
require_once("view/addMember.php");
require_once("view/addBoat.php");
require_once("view/emptyView.php");
require_once("controller/verboseListController.php");
require_once("controller/compactListController.php");
require_once("controller/navigationController.php");

session_start();

$m = new Member();
$am = new AddMember();
$ab = new AddBoat();
$v = new View();
$b = new Boat();
$ev = new emptyView();
$rb = new RenderBoat($b);
$rm = new RenderMember($m);
$vlc = new VerboseController();
$clc = new CompactController();
$p = new Persistance();
// Load in nav
$nc = new NavController();

$nc->showView($v, $m, $am, $ab, $b, $ev, $vlc, $clc, $rb, $rm, $p);

<?php
require_once("view/renderBoat.php");
require_once("view/renderMember.php");

class NavController {
    
    public function showView(View $v,Member $m,AddMember $am,AddBoat $ab,Boat $b,EmptyView $ev,VerboseController $vlc, CompactController $clc) {
    // If addMember 'send' button is pressed.
    if (isset($_POST['addMember::button'])) {
    // check so there is content in inputs.
        if ($_POST['addMember::fullName'] == '' || $_POST['addMember::personalNumber'] == '') {
            $v->render($am);
        } else {
            // function addMember in controller.
            addMember($m);
            $v->render($ab);
        }
    } else {
    // Nav
        if (isset($_POST['view::NewMember'])) {
            $v->render($am);
        } else if (isset($_POST['view::VerboseList'])) {
            $v->render($vlc);
        } else if (isset($_POST['view::CompactList'])) {
            $v->render($clc);
        } else if (isset($_POST['RenderBoat::change'])) {
            // get values.
            $type =  $_POST["RenderBoat::type"];
            $length =  $_POST["RenderBoat::length"];
            $ID =  $_POST["RenderBoat::ID"];
            $rb = new RenderBoat($type, $length, $ID);
            $v->render($rb);
        } else if (isset($_POST['RenderMember::change'])) {
            $fullName =  $_POST["RenderMember::fullName"];
            $personalNumber =  $_POST["RenderMember::personalNumber"];
            $ID =  $_POST["RenderMember::ID"];
            $rm = new RenderMember($fullName, $personalNumber, $ID);
            $v->render($rm);

        } else {
            $v->render($ev);
        }
    }
    // If addboat 'send' button is pressed.
        if (isset($_POST['AddBoat::button'])) {
            // function addBoat in controller.
            addBoat($b);
        }
    }
}
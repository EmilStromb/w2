<?php
require_once("view/renderBoat.php");
require_once("view/renderMember.php");

class NavController {
    
    public function showView(View $v,Member $m,AddMember $am,AddBoat $ab,Boat $b,EmptyView $ev,VerboseController $vlc, CompactController $clc, BoatController $bc, MemberController $mc) {
    // If addMember 'send' button is pressed.
    if (isset($_POST['addMember::button'])) {
    // check so there is content in inputs.
        if ($_POST['addMember::fullName'] == '' || $_POST['addMember::personalNumber'] == '') {
            $v->render($am);
        } else {
            // function addMember in controller.
            $mc->addMember($m);
            $v->render($ab);
        }
    } else {
    // Nav
        if (isset($_POST['view::NewMember'])) {
            $v->render($am);
            // Nav
        } else if (isset($_POST['view::VerboseList'])) {
            $v->render($vlc);
            // Nav
        } else if (isset($_POST['view::CompactList'])) {
            $v->render($clc);
             // if change button is pressed!
        } else if (isset($_POST['RenderBoat::change'])) {
            // get values.
            $type =  $_POST["RenderBoat::type"];
            $length =  $_POST["RenderBoat::length"];
            $ID =  $_POST["RenderBoat::ID"];
            $rb = new RenderBoat($type, $length, $ID);
            $v->render($rb);
             // if change button is pressed!
        } else if (isset($_POST['RenderMember::change'])) {
            // get values.
            $fullName =  $_POST["RenderMember::fullName"];
            $personalNumber =  $_POST["RenderMember::personalNumber"];
            $ID =  $_POST["RenderMember::ID"];
            $rm = new RenderMember($fullName, $personalNumber, $ID);
            $v->render($rm);

            // if update/delete button is pressed!
        } else if (isset($_POST['RenderMember::update'])) {
            if($_POST['RenderMember::update'] == "Update member") {
                $v->render($ev);
                $vlc->removeFromFile('members.txt' ,'RenderMember::ID');
                $mc->updateMember($_POST['RenderMember::fullName'], $_POST['RenderMember::personalNumber'], $_POST['RenderMember::ID']);
            } else {
                $v->render($ev);
                $vlc->removeFromFile('members.txt' ,'RenderMember::ID');
                echo "successfully deleted member!";
                // delete member
            }

        } else if (isset($_POST['RenderBoat::update'])) {
            if($_POST['RenderBoat::update'] == "Update boat") {
                $v->render($ev);
                $vlc->removeFromFile('boats.txt' ,'RenderBoat::ID');
                $bc->updateBoat($_POST['RenderBoat::type'], $_POST['RenderBoat::length'], $_POST['RenderBoat::ID']);
            } else {
                $v->render($ev);
                $vlc->removeFromFile('boats.txt' ,'RenderBoat::ID');
                echo "successfully deleted boat!";
                // delete member
            }
        } else {
            $v->render($ev);
        }
    }
    // If addboat 'send' button is pressed.
        if (isset($_POST['AddBoat::button'])) {
            // function addBoat in controller.
            $bc->addBoat($b);
        }
    }
}
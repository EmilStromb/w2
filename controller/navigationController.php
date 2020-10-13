<?php

class NavController {

    public function showView(View $v,Member $m,AddMember $am,AddBoat $ab,Boat $b,EmptyView $ev,VerboseController $vlc, CompactController $clc) {
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
            $v->render($vlc);
        } else if (isset($_POST['view::CompactList'])) {
            $v->render($clc);
        } else {
            $v->render($ev);
        }
    }
    // If addboat 'send' button is pressed.
        if (isset($_POST['AddBoat::button'])) {
            addBoat($b);
        }
    }
}
<?php
require_once("view/renderBoat.php");
require_once("view/renderMember.php");

class NavController {
    
    public function showView(View $v,Member $m,AddMember $am,AddBoat $ab,Boat $b,EmptyView $ev,VerboseController $vlc, CompactController $clc, BoatController $bc, MemberController $mc, RenderBoat $rb, RenderMember $rm) {
    // If addMember 'send' button is pressed.
    if ($am->getSendBtn()) {
    // check so there is content in inputs.
        if ($am->getFullName() == '' || $am->getPersonalNumber() == '') {
            $v->render($am);
        } else {
            // function addMember in controller.
            $mc->addMember($m, $am);
            $v->render($ab);
        
        }
        // If addboat 'send' button is pressed.
    } else if ($ab->getSendBtn()) {
        // function addBoat in controller.
        $bc->addBoat($b, $ab);
        $v->render($ev);
    } else {
    // Nav
        if ($v->getMemberSendBtn()) {
            $v->render($am);
            // Nav
        } else if ($v->getVerboseListSendBtn()) {
            $v->render($vlc);
            // Nav
        } else if ($v->getCompactListSendBtn()) {
            $v->render($clc);
             // if change button is pressed!
        } else if ($rb->getSendBtn()) {
            // get values.
            $type = $rb->getType();
            $length =  $rb->getLength();
            $ID = $rb->getID();
            $rb = new RenderBoat($type, $length, $ID);
            $v->render($rb);
             // if change button is pressed!

        } else if ($rm->getSendBtn()) {
            // get values.
            $fullName =  $rm->getName();
            $personalNumber = $rm->getPersonalNumber();
            $ID =  $rm->getID();
            $rm = new RenderMember($fullName, $personalNumber, $ID);
            $v->render($rm);

            // if update/delete button is pressed!
        } else if ($rm->getUpdateSendBtn()) {
            if($rm->getUpdateBtnValue() == "Update member") {
                $v->render($ev);
                $vlc->removeFromFile('members.txt' ,$rm->getID());
                $mc->updateMember($rm->getName(), $rm->getPersonalNumber(), $rm->getID());

            } else {
                $v->render($ev);
                $vlc->removeFromFile('members.txt' ,$rm->getID());
                echo "successfully deleted member!";
                // delete member
            }

        } else if ($rb->getUpdateSendBtn()) {
            if($rb->getUpdateBtnValue() == "Update boat") {
                $v->render($ev);
                $vlc->removeFromFile('boats.txt' ,$rb->getID());
                $bc->updateBoat($rb->getType(), $rb->getLength(), $rb->getID());
                
            } else {
                $v->render($ev);
                $vlc->removeFromFile('boats.txt' ,$rb->getID());
                echo "successfully deleted boat!";
                // delete member
            }
        } else {
            $v->render($ev);
        }
    }
    }
}
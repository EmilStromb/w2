<?php
require_once("view/renderBoat.php");
require_once("view/renderMember.php");
require_once('model/boat.php');
require_once('model/member.php');

class NavController {

    private $memberFile = "members.txt";
    private $boatFile = "boats.txt";
    
    public function showView(View $v,Member $m,AddMember $am,AddBoat $ab,Boat $b, emptyView $ev, VerboseController $vlc, CompactController $clc, RenderBoat $rb, RenderMember $rm, Persistance $p) {
    // If addMember 'send' button is pressed.
    if ($am->getSendBtn()) {
    // check so there is content in inputs.
        if ($am->getFullName() == '' || $am->getPersonalNumber() == '') {
            $v->render($am);
        } else {
            $p->addMember($m, $am);
            $v->render($ab);
        
        }
        // If addboat 'send' button is pressed.
    } else if ($ab->getSendBtn()) {
        $p->addBoat($b, $ab);
        $v->render($ev);
    } else {
    // Nav
        if ($v->getMemberBtn()) {
            $v->render($am);
            // Nav
        } else if ($v->getVerboseListBtn()) {
            $v->render($vlc);
            // Nav
        } else if ($v->getCompactListBtn()) {
            $v->render($clc);
             // if change button is pressed!
        } else if ($rb->getSendBtn()) {
            $b = new boat();
            $b->set($rb->getType(), $rb->getLength());
            $rb = new RenderBoat($b);
            $p->removeFromFileBoat($this->boatFile ,$rb->getType(), $rb->getLength());
            $v->render($rb);
             // if change button is pressed!

        } else if ($rm->getSendBtn()) {
            $m = new member();
            $m->set($rm->getName(), $rm->getPersonalNumber(), $rm->getID());
            $rm = new RenderMember($m);
            $v->render($rm);

            // if update/delete button is pressed!
        } else if ($rm->getUpdateSendBtn()) {
            if($rm->getUpdateBtnValue() == "Update member") {
                $v->render($ev);
                $p->removeFromFile($this->memberFile ,$rm->getID());
                $m = new member();
                $m->set($rm->getName(), $rm->getPersonalNumber(), $rm->getID());
                $p->updateMember($m);

            } else {
                $v->render($ev);
                $p->removeFromFile($this->memberFile ,$rm->getID());
                echo "successfully deleted member!";
                // delete member
            }

        } else if ($rb->getUpdateSendBtn()) {
            if($rb->getUpdateBtnValue() == "Update boat") {
                $v->render($ev);
                $b = new boat();
                $b->set($rb->getType(), $rb->getLength());
                $p->updateBoat($b);
                
            } else {
                $v->render($ev);
                echo "successfully deleted boat!";
                // delete boat
            }
        } else {
            $v->render($ev);
        }
    }
    }
}
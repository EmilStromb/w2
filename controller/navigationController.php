<?php
require_once("view/renderBoat.php");
require_once("view/renderMember.php");
require_once('model/boat.php');
require_once('model/member.php');

class NavController {
    
    public function showView(View $v,member $m, AddMember $am,AddBoat $ab,Boat $b, emptyView $ev, VerboseController $vlc, CompactController $clc, RenderBoat $rb, RenderMember $rm, Persistance $p) {
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
        $p->addBoat($b, $ab, $m);
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
                $oldMember = $p->removeFromFile($rm->getID());
                $m = new member();
                $m->set($rm->getName(), $rm->getPersonalNumber(), $rm->getID());
                $p->updateMember($m, $oldMember);

            } else {
                $v->render($ev);
                $p->removeFromFile($rm->getID());
                echo "successfully deleted member!";
                // delete member
            }

        } else if ($rb->getUpdateSendBtn()) {
            if($rb->getUpdateBtnValue() == "Update boat") {
                $v->render($ev);
                $member = $p->removeFromFileBoat($rb->getOldType(), $rb->getOldLength());
                
                $b = new boat();
                echo $rb->getType() . $rb->getLength();
                $b->set($rb->getType(), $rb->getLength());
                $p->updateBoat($b, $member);
                
            } else {
                $v->render($ev);
                $p->removeFromFileBoat($rb->getOldType(), $rb->getOldLength());
                echo "successfully deleted boat!";
                // delete boat
            }
        } else {
            $v->render($ev);
        }
    }
    }
}
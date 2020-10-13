<?php

class VerboseController {

    public function show() {
        require_once('view/renderMember.php');
        require_once('view/renderBoat.php');

        $myHTML = "";
        $myHTML = $this->renderMemberInfo($myHTML);
        // add the html for each boat.
        foreach (file('boats.txt') as $line) {
            $data = explode(',', $line);
            $theRender = new renderboat($data[0], $data[1], $data[2]);
            $myHTML .= $theRender->render();
        }
        // return to be shown.
        return $myHTML;
    }

    public function renderMemberInfo($myHTML) {
        // add the html for each member.
        foreach (file('members.txt') as $line) {
            $data = explode(',', $line);
            $theRender = new renderMember($data[0], $data[1], $data[2]);
            $myHTML .= $theRender->render();
        }
        return $myHTML;
    }
}



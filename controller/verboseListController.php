<?php
    require_once('view/renderMember.php');
    require_once('view/renderBoat.php');
    require_once('model/boat.php');
    require_once('model/member.php');

class VerboseController {

    public function show() {

        $myHTML = "";
        $myHTML = $this->renderMemberInfo($myHTML); 
        // add the html for each boat.
        foreach (file('boats.txt') as $line) {
            $data = explode(',', $line);
            $b = new boat();
            $b->set($data[0], $data[1]);
            $theRender = new Renderboat($b);
            $myHTML .= $theRender->render();
        }
        // return to be shown.
        return $myHTML;
    }

    public function renderMemberInfo($myHTML) {
        // add the html for each member.
        foreach (file('members.txt') as $line) {
            $data = explode(',', $line);
            $m = new member();
            $m->set($data[0], $data[1], $data[2]);
            $theRender = new RenderMember($m);
            $myHTML .= $theRender->render();
        }
        return $myHTML;
    }
}



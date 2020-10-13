<?php

class verboseController {

    public function show() {
        require_once('view/renderMember.php');

        $myHTML = '';
        foreach (file('members.txt') as $line) {
            $data = explode(',', $line);
            $theRender = new renderMember($data[0], $data[1], $data[2]);
            $myHTML .= $theRender->render();
        }
        return $myHTML;
    }
}



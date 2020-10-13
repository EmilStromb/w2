<?php

class CompactController {
    
    public function show() {
        require_once('view/renderMember.php');
        require_once('view/renderBoat.php');
        require_once("verboseListController.php");
        $vlc = new VerboseController();

        $myHTML = "";
        $myHTML = $vlc->renderMemberInfo($myHTML);
        $count = 0;
        foreach (file('boats.txt') as $line) {
            $data = explode(',', $line);
            $count ++;
        }
        $boatAmountRender = new renderBoat($data[0], $data[1], $data[2]);
        $myHTML .= $boatAmountRender->renderAmout($count);
        // return to be shown.
        return $myHTML;
    }
}



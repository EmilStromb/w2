<?php
        require_once('view/renderMember.php');
        require_once('view/renderBoat.php');
        require_once("verboseListController.php");
        require_once('model/boat.php');


class CompactController {
    
    public function show() {

        $vlc = new VerboseController();

        $count = 0;
        foreach (file('boats.txt') as $line) {
            $data = explode(',', $line);
            $count ++;
        }
        $b = new boat();
        $b->set($data[0], $data[1]);
        $boatAmountRender = new RenderBoat($b);
        $myHTML = $boatAmountRender->renderAmout($count);
        $myHTML = $vlc->renderMemberInfo($myHTML);
        
        // return to be shown.
        return $myHTML;
    }
}



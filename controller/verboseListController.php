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
            $theRender = new Renderboat($data[0], $data[1], $data[2]);
            $myHTML .= $theRender->render();
        }
        // return to be shown.
        return $myHTML;
    }

    // This renders the member info, association -> compactListController.php
    public function renderMemberInfo($myHTML) {
        // add the html for each member.
        foreach (file('members.txt') as $line) {
            $data = explode(',', $line);
            $theRender = new RenderMember($data[0], $data[1], $data[2]);
            $myHTML .= $theRender->render();
        }
        return $myHTML;
    }

    public function removeFromFile($file, $ID) {
        $lineCount = 0;
        foreach (file($file) as $line) {
            $data = explode(',', $line);
            // Check so the ID of user/boat matches
            if ($data[2] === $ID . "\n")  {
                // Read the whole file
                $file_out = file($file); 
                //Delete the recorded line
                unset($file_out[$lineCount]);
                //Recorded in a file
                file_put_contents($file, implode("", $file_out));
                return;
            }
            $lineCount ++;
        }
    }
}



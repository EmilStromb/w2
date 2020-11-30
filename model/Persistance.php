<?php
    require_once('view/renderMember.php');
    require_once('view/renderBoat.php');
class Persistance {

    private $memberFile = "members.txt";
    private $listMembers = Array();

    public function addMember(member $m, AddMember $am) {
        // Get posted name and personalnumber.
        $name =  $am->getFullName();
        $personalNumber = $am->getPersonalNumber();
        
        $count = 1;
        foreach (file('members.txt') as $line) {
            $member = unserialize($line);
            if ($count <= $member->getMemberID()) {
                $count = (int)$member->getMemberID();
                $count++;
            }
        }
        // Set the information in a new model.
        $m->setMemberName($name);
        $m->setPersonalNumber($personalNumber);
        $m->setMemberID($count);

        $_SESSION['member'] = serialize($m);
    }

    
    public function updateMember(member $m, member $oldMember) {
        $m->addBoat($oldMember->getBoats()[0]);
        array_push($this->listMembers, $m);
        $this->saveToFile($this->listMembers);

    }

    public function addBoat(boat $b, addBoat $ab) {
        // Get boat type and length.
        $type = $ab->getBoatType();
        $length = $ab->getBoatLength();
                
        // Set type and lenght on boat.
        $b->setBoatType($type);
        $b->setBoatLength($length);

        $m = unserialize($_SESSION['member']);
        $m->addBoat($b);
        array_push($this->listMembers, $m);
        $this->saveToFile($this->listMembers);
    }
    
    public function updateBoat(boat $b, member $member) {
        var_dump($b);
        $m = new member();
        $m->set($member->getMemberName(), $member->getPersonalNumber(), $member->getMemberID());
        $m->addBoat($b);
        array_push($this->listMembers, $m);
        $this->saveToFile($this->listMembers);
    }

    private function saveToFile($list) {
        $data = serialize($list[0]);
        $file = fopen($this->memberFile, 'a');
        fwrite($file, $data . "\n");
        fclose($file);
    }

    public function getList($listType) {
        $myHTML = "";
        $count = 0;
        foreach (file($this->memberFile) as $line) {
            $member = unserialize($line);
            $theRender = new RenderMember($member);
            $myHTML .= $theRender->render();
            $boats = $member->getBoats();
            $renderBoats = new RenderBoat($boats[0]);

            if ($listType == "verbose") {
                $myHTML .= $renderBoats->render();
            } else {
                $count++;
            }

        }
        if ($listType == "compact") {
            $myHTML .= $renderBoats->renderAmout($count);
        }
        return $myHTML;
    }
    
    
    public function removeFromFile($ID) {
        $lineCount = 0;
        foreach (file($this->memberFile) as $member) {
            $member = unserialize($member);
            // Check so the ID of user matches
            if ($member->getMemberID() == $ID)  {
                
                $this->deleteFromFile($lineCount);
                return $member;
            }
            $lineCount ++;
        }
    }

    public function removeFromFileBoat($type, $length) {
        $lineCount = 0;
        foreach (file($this->memberFile) as $member) {
            $member = unserialize($member);
            $boats = $member->getBoats()[0];

            if ($boats->getBoatType() == $type && $boats->getBoatLength() == $length)  {
                $this->deleteFromFile($lineCount);
                return $member;
            }
            $lineCount ++;
        }
    }

    private function deleteFromFile($lineCount) {
        // Read the whole file
        $file_out = file($this->memberFile); 
        //Delete the recorded line
        unset($file_out[$lineCount]);
        //Recorded in a file
        file_put_contents($this->memberFile, implode("", $file_out));
    }  
    
} 
<?php
    require_once('model/Persistance.php');

class CompactController {
    
    public function show() {

        $p = new Persistance();
        return $p->getList("compact");
    }
}



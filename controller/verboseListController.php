<?php
    require_once('model/Persistance.php');

class VerboseController {

    public function show() {
        $p = new Persistance();
        return $p->getList("verbose");
    }

}



<?php

use Adianti\Database\TRecord;

class Habilidade extends TRecord {
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max';
    const TABLENAME = 'habilidade';

    public function __construct($id = null, $callObjectLoad = false) {
        parent::__construct($id, $callObjectLoad);

        parent::addAttribute("nome");
    }
}
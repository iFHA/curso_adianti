<?php

use Adianti\Database\TRecord;

class Estado extends TRecord {
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max';
    const TABLENAME = 'estado';

    public function __construct($id = null, $callObjectLoad = false) {
        parent::__construct($id, $callObjectLoad);

        parent::addAttribute("nome");
    }
}
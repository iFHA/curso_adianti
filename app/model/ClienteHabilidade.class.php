<?php

use Adianti\Database\TRecord;

class ClienteHabilidade extends TRecord {
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max';
    const TABLENAME = 'cliente_habilidade';

    public function __construct($id = null, $callObjectLoad = false) {
        parent::__construct($id, $callObjectLoad);

        parent::addAttribute("cliente_id");
        parent::addAttribute("habilidade_id");
    }
}
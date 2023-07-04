<?php

use Adianti\Database\TRecord;

class Categoria extends TRecord {
    const TABLENAME = "categoria";
    const PRIMARYKEY = "id";
    const IDPOLICY = "max";

    public function __construct(int $id = null, bool $callObjectLoad = true) {
        parent::__construct($id, $callObjectLoad);

        parent::addAttribute("nome");
    }
}
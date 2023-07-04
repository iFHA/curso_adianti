<?php

use Adianti\Database\TRecord;

class Contato extends TRecord {
    const TABLENAME = "contato";
    const PRIMARYKEY = "id";
    const IDPOLICY = "max";

    private Cliente $cliente;

    public function __construct($id = null, $callObjectLoad = true) {
        parent::__construct($id, $callObjectLoad);

        parent::addAttribute('tipo');
        parent::addAttribute('valor');
        parent::addAttribute('cliente_id');
    }

    public function get_cliente():Cliente {
        if (empty($this->cliente)) {
            $this->cliente = Cliente::find($this->cliente_id);
        }
        return $this->cliente;
    }
}
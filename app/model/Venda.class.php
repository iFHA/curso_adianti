<?php

use Adianti\Database\TRecord;

class Venda extends TRecord {
    const TABLENAME = "venda";
    const PRIMARYKEY = "id";
    const IDPOLICY = "max";

    private Cliente $cliente;

    public function __construct($id = null, $callObjectLoad=true) {
        parent::__construct($id, $callObjectLoad);

        parent::addAttribute("dt_venda");
        parent::addAttribute("total");
        parent::addAttribute("cliente_id");
        parent::addAttribute("obs");
    }

    public function get_cliente():Cliente {
        if(empty($this->cliente)) {
            $this->cliente = Cliente::find($this->cliente_id);
        }
        return $this->cliente;
    }
}
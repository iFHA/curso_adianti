<?php

use Adianti\Database\TRecord;

class Cliente extends TRecord {

    const TABLENAME = "cliente";
    const PRIMARYKEY = "id";
    const IDPOLICY = "max";
    const CREATEDAT = "created_at";
    const UPDATEDAT = "updated_at";

    private $categoria;
    private $cidade;

    public function __construct($id = null, $callObjectLoad = true) {
        parent::__construct($id, $callObjectLoad);

        parent::addAttribute("nome");
        parent::addAttribute("endereco");
        parent::addAttribute("telefone");
        parent::addAttribute("nascimento");
        parent::addAttribute("situacao");
        parent::addAttribute("email");
        parent::addAttribute("genero");
        parent::addAttribute("categoria_id");
        parent::addAttribute("cidade_id");

    }

    public function get_cidade() {
        if(empty($this->cidade)) {
            $this->cidade = Cidade::find($this->cidade_id);
        }
        return $this->cidade;
    }
    public function get_categoria() {
        if(empty($this->categoria)) {
            $this->categoria = Categoria::find($this->categoria_id);
        }
        return $this->categoria;
    }
}
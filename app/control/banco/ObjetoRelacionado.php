<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;

class ObjetoRelacionado extends TPage {
    public function __construct() {
        parent::__construct();
        try {
            TTransaction::open('curso');
            TTransaction::dump();
            
            // $contatos = Cliente::find(1)->hasMany('Contato', 'cliente_id', 'id', 'tipo');
            $contatos = Cliente::find(1)->filterMany('Contato')->where('tipo', '=', 'face')->load();
            echo "<pre>";
            print_r($contatos);
            echo "</pre>";
            TTransaction::close();
        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
        }
        // parent::add();
    }
}
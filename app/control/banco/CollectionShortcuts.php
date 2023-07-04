<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;

class CollectionShortcuts extends TPage {
    public function __construct() {
        parent::__construct();
        try {
            TTransaction::open('curso');
            TTransaction::dump();
            
            // $clientes = Cliente::all();
            // echo "<pre>";
            // var_dump($clientes);
            // echo "</pre>";

            // $clientes = Cliente::where("situacao", "=", "Y")
            //                ->where("genero", "=", "F")
            //                ->orderBy("nome")
            //                ->load();
            // $clientes = Cliente::take(10)
            //                ->skip(20)
            //                ->load();
            // $clientes = Cliente::where("id", ">", "10")
            //                ->first();
            // echo "<pre>";
            // var_dump($clientes);
            // echo "</pre>";

            Cliente::where('cidade_id', '=', 3)->set('telefone', '11-22-33')->update();

            TTransaction::close();
        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
        }
        // parent::add();
    }
}
<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;

class CollectionShortcuts extends TPage {
    public function __construct() {
        parent::__construct();
        try {
            TTransaction::open('curso');
            
            // $clientes = Cliente::all();
            // echo "<pre>";
            // var_dump($clientes);
            // echo "</pre>";

            $clientes = Cliente::where("situacao", "=", "Y")
                           ->where("genero", "=", "F")
                           ->orderBy("nome")
                           ->load();
            echo "<pre>";
            var_dump($clientes);
            echo "</pre>";

            TTransaction::close();
        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
        }
        // parent::add();
    }
}
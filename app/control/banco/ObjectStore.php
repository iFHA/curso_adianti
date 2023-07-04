<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Log\TLoggerSTD;
use Adianti\Widget\Dialog\TMessage;

class ObjectStore extends TPage {
    public function __construct(){
        parent::__construct();

        try {
            TTransaction::open('curso');
            TTransaction::dump();

            $produto = Produto::where('descricao', '=', 'teste2')->first();
            if(!$produto) {
                Produto::create([
                    'descricao' => 'teste2',
                    'estoque' => 25,
                    'preco_venda' => 400,
                    'unidade' => 'kg',
                    'local_foto' => ''
                ]);
            }

            $produto->delete();

            $produtos = Produto::all();
            foreach ($produtos as $produto) {
                echo $produto->id . ' - ' . $produto->descricao . '<br>';
            }
            TTransaction::close();
        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }
}
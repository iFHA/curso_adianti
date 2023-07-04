<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;

class ObjectStore extends TPage {
    public function __construct(){
        parent::__construct();

        try {
            TTransaction::open('curso');

            $produto = Produto::where('descricao', '=', 'teste2')->get();
            if(!$produto) {
                Produto::create([
                    'descricao' => 'teste2',
                    'estoque' => 25,
                    'preco_venda' => 400,
                    'unidade' => 'kg',
                    'local_foto' => ''
                ]);
            }


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
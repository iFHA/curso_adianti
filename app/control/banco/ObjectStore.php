<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;

class ObjectStore extends TPage {
    public function __construct(){
        parent::__construct();

        try {
            TTransaction::open('curso');

            $produto = Produto::where('descricao', '=', 'teste')->get();
            if(!$produto) {
                $produto = new Produto;
                $produto->descricao = 'teste';
                $produto->estoque = 25;
                $produto->preco_venda = 400;
                $produto->unidade = 'kg';
                $produto->local_foto = '';
                $produto->store();
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
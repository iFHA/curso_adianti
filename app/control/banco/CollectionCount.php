<?php

use Adianti\Control\TPage;
use Adianti\Database\TCriteria;
use Adianti\Database\TExpression;
use Adianti\Database\TFilter;
use Adianti\Database\TRepository;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;

class CollectionCount extends TPage {
    public function __construct() {
        parent::__construct();

        try {
            TTransaction::open('curso');

            $criteria = new TCriteria;
            $criteria->add(new TFilter('situacao', '=', 'Y'), TExpression::OR_OPERATOR);
            $criteria->add(new TFilter('genero', '=', 'F'));

            $repository = new TRepository('Cliente');
            $clientes = $repository->load($criteria);
            if($clientes) {
                foreach($clientes as $cliente) {
                    echo $cliente->id . 
                    ' - ' . $cliente->nome . 
                    ', Categoria: ' . $cliente->categoria->nome .
                    ', Cidade: ' . $cliente->cidade->nome . '/' . $cliente->cidade->estado->nome.
                    '<br>';
                }
            }
            TTransaction::close();
        } catch(Exception $e) {
            new TMessage('error', $e->getMessage());
        }

    }
}
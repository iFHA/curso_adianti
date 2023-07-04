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
            TTransaction::dump();

            $criteria = new TCriteria;
            $criteria->add(new TFilter('situacao', '=', 'Y'));
            $criteria->add(new TFilter('genero', '=', 'F'));

            $repository = new TRepository('Cliente');
            $repository->update(['telefone'=>'111 2222 3333'],$criteria);
            
            TTransaction::close();
        } catch(Exception $e) {
            new TMessage('error', $e->getMessage());
        }

    }
}
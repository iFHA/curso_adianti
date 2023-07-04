<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;

class CollectionAggregation extends TPage {
    public function __construct() {
        parent::__construct();
        try {
            TTransaction::open('curso');
            TTransaction::dump();

            $total = Venda::sumBy("total");
            echo $total;

            TTransaction::close();
        } catch(Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }
}
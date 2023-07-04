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
            echo "Total: $total<br>";
            $count = Venda::count();
            echo "Count: $count";
            $count = Venda::countDistinctBy("total");
            echo "CountDistinctyByTotal: $count";
            $rows = Venda::groupBy("dt_venda, cliente_id")->sumBy("total");
            echo "<pre>";
            var_dump($rows);
            echo "</pre>";


            TTransaction::close();
        } catch(Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }
}
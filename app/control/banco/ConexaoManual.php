<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;

class ConexaoManual extends TPage {
    public function __construct() {
        parent::__construct();

        try {
            TTransaction::open('curso');

            // TTransaction::getDatabase()
            // TTransaction::getDatabaseInfo()

            $conn = TTransaction::get();

            $preparedStatement = $conn->prepare("select id, nome from cliente where id between ? and ?");
            $preparedStatement->execute([1,10]);
            while($result = $preparedStatement->fetch()) {
                echo "{$result['id']} - {$result['nome']}<br>";
            }

            TTransaction::close();
        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }
}
<?php

use Adianti\Control\TPage;
use Adianti\Widget\Container\TNotebook;
use Adianti\Widget\Container\TTable;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TLabel;

class NotebookView extends TPage {
    public function __construct() {
        parent::__construct();

        $table1 = new TTable;
        $table2 = new TTable;

        for ($i=1; $i<=20; $i++) {
            $table1->addRowSet(new TLabel("Field $i"), new TEntry("field$i"));
            $table2->addRowSet(new TLabel("Field T2 $i"), new TEntry("fieldt2$i"));
        }

        $notebook = new TNotebook();
        $notebook->appendPage('Aba 1', $table1);
        $notebook->appendPage('Aba 2', $table2);

        parent::add($notebook);
    }
}
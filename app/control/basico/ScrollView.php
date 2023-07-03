<?php

use Adianti\Control\TPage;
use Adianti\Widget\Container\TScroll;
use Adianti\Widget\Container\TTable;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TLabel;

class ScrollView extends TPage {
    public function __construct() {
        parent::__construct();

        $scroll = new TScroll;
        $scroll->setSize("100%", "400px");
        $table = new TTable;

        for ($i=1; $i<=20; $i++) {
            $table->addRowSet(new TLabel("Field $i"), new TEntry("field$i"));
        }

        $scroll->add($table);
        parent::add($scroll);
    }
}
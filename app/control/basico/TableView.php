<?php

use Adianti\Control\TPage;
use Adianti\Widget\Container\TTable;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TLabel;

class TableView extends TPage {
    public function __construct(){
        parent::__construct();
        $table = new TTable();
        $table->width = "100%";
        $table->border = "1";
        $table->cellpadding = "4";
        $table->style = "border-collapse: collapse;";
        $row = $table->addRow();
        $row->addCell('Input');
        $row->addCell('Valor');

        $id = new TEntry('id');
        $nome = new TEntry('nome');
        $endereco = new TEntry('endereco');
        $fone = new TEntry('fone');
        $obs = new TEntry('obs');

        $table->addRowSet(new TLabel('Código'), $id);
        $table->addRowSet(new TLabel('Nome'), $nome);
        $table->addRowSet(new TLabel('Endereço'), $endereco);
        $table->addRowSet(new TLabel('Fone'), $fone);
        $table->addRowSet(new TLabel('Obs'), $obs);

        parent::add($table);
    }
}
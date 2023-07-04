<?php

use Adianti\Control\TPage;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TLabel;
use Adianti\Wrapper\BootstrapFormBuilder;

class FormularioBootstrapColunas extends TPage {
    private $form;
    public function __construct() {
        parent::__construct();
    
        $this->form = new BootstrapFormBuilder("form");
        $this->form->appendPage("Colunas manuais");

        $row = $this->form->addFields([new TLabel('field1')], [new TEntry('field1')]);
        $row->layout = ['col-sm-2 control-label', 'col-sm-10'];

        parent::add($this->form);
    }
}
<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Widget\Container\TNotebook;
use Adianti\Widget\Container\TPanelGroup;
use Adianti\Widget\Container\TTable;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Form\TButton;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TForm;
use Adianti\Widget\Form\TLabel;

class FormularioManual extends TPage {

    private $form;

    public function __construct() {
        parent::__construct();

        $this->form = new TForm("form");
        $notebook = new TNotebook;
        $this->form->add($notebook);

        $table1 = new TTable;
        $table2 = new TTable;

        $table1->width = '100%';
        $table2->width = '100%';

        $table1->style = 'padding:10px';
        $table2->style = 'padding:10px';

        $input1 = new TEntry("input1");
        $input2 = new TEntry("input2");
        $input3 = new TEntry("input3");
        $input4 = new TEntry("input4");
        $input5 = new TEntry("input5");
        $input6 = new TEntry("input6");
        $input7 = new TEntry("input7");
        $input8 = new TEntry("input8");

        $table1->addRowSet(new TLabel("Campo 1"), $input1);
        $table1->addRowSet(new TLabel("Campo 2"), $input2);
        $table1->addRowSet(new TLabel("Campo 3"), $input3);
        $table1->addRowSet(new TLabel("Campo 4"), $input4);

        $table2->addRowSet(new TLabel("Campo 5"), $input5);
        $table2->addRowSet(new TLabel("Campo 6"), $input6);
        $table2->addRowSet(new TLabel("Campo 7"), $input7);
        $table2->addRowSet(new TLabel("Campo 8"), $input8);

        $botaoEnviar = new TButton("enviar");
        $botaoEnviar->setAction(new TAction([$this, 'onSend']), "Enviar");
        $botaoEnviar->setImage('fa:save');

        $notebook->appendPage("Página 1", $table1);
        $notebook->appendPage("Página 2", $table2);

        $panel = new TPanelGroup("Formulário Manual");
        $panel->add($this->form);
        $panel->addFooter($botaoEnviar);

        $this->form->setFields([$input1, $input2, $input3, $input4, $input5, $input6, $input7, $input8, $botaoEnviar]);

        parent::add($panel);

    }

    public function onSend($param) {
        $dados = $this->form->getData();
        $this->form->setData($dados);
        new TMessage('info', json_encode($dados));
    }
    
}
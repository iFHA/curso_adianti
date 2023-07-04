<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Widget\Dialog\TInputDialog;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TLabel;
use Adianti\Wrapper\BootstrapFormBuilder;

class DialogInputView extends TPage {
    public function __construct() {
        parent::__construct();

        $form = new BootstrapFormBuilder('input_form');

        $login = new TEntry('campo_login');
        $senha = new TEntry('campo_senha');

        $form->addFields([new TLabel("Login: ")], [$login]);
        $form->addFields([new TLabel("Senha: ")], [$senha]);
        $form->addAction("Confirma", new TAction([__CLASS__, "onConfirm1"]), 'fa:save green');
        
        new TInputDialog("Título", $form);

    }

    public static function onConfirm1($param) {
        new TMessage('info', "Login: {$param['campo_login']}, senha: {$param['campo_senha']}");
    }
}
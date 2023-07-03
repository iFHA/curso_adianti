<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Dialog\TQuestion;

class QuestionView extends TPage {
    public function __construct () {
        parent::__construct();

        $actionYes = new TAction([$this, 'onSuccess']);
        $actionYes->setParameter('parametro1', 'p1');
        $actionNo = new TAction([$this, 'onError']);

        new TQuestion("Sim ou não?", $actionYes, $actionNo);
    }

    public static function onSuccess($param) {
        new TMessage('info', "OK {$param['parametro1']}");
    }
    public static function onError() {
        new TMessage('error', "Nope");
    }
}
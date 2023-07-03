<?php

use Adianti\Control\TPage;
use Adianti\Widget\Dialog\TMessage;

class InformationView extends TPage {
    public function __construct() {
        parent::__construct();
        // primeiro parâmetro: info, error, warning
        new TMessage('info', "informação");
    }
}
<?php

use Adianti\Control\TPage;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Template\THtmlRenderer;

class TemplateViewBasico extends TPage {
    public function __construct() {
        parent::__construct();

        try {
            $html = new THtmlRenderer('app/resources/template-basico.html');
            $html->enableSection('main', ['title' => 'titulo teste', 'content' => 'conteúdo teste']);
            $html->enableSection('outros', ['title' => 'Outros', 'content' => 'conteúdo teste outros']);
            parent::add($html);
        } catch(Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }
}
<?php

use Adianti\Control\TWindow;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Template\THtmlRenderer;

class ModalWindowView extends TWindow {
    public function __construct() {
        parent::__construct();
        parent::removePadding();
        parent::removeTitleBar();
        parent::disableEscape();
        try {
            $html = new THtmlRenderer('app/resources/template-modal.html');
            $html->enableSection('main', ['title' => 'titulo teste', 'content' => 'conteúdo teste']);
            $html->enableSection('outros', ['title' => 'Outros', 'content' => 'conteúdo teste outros']);
            parent::add($html);
        } catch(Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }
}
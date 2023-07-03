<?php

use Adianti\Control\TWindow;
use Adianti\Widget\Template\THtmlRenderer;

class TemplateWindow extends TWindow {
    public function __construct() {
        parent::__construct();

        parent::setTitle("Janela Simples");
        parent::setSize(.5,null);
        // parent::removePadding();
        $template = new THtmlRenderer('app/resources/template-window.html');
        $template->enableSection('main');
        parent::add($template);
    }
}
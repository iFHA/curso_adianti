<?php

use Adianti\Control\TPage;
use Adianti\Control\TWindow;
use Adianti\Widget\Template\THtmlRenderer;

class TemplateWindowOnDemand extends TPage {
    public function __construct() {
        parent::__construct();

        $window = TWindow::create("Janela sob demanda", .8, null);
        $html = new THtmlRenderer('app/resources/template-window.html');
        $html->enableSection('main');
        $window->add($html);
        $window->show();
    }
}
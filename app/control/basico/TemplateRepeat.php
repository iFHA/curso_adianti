<?php

use Adianti\Control\TPage;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Template\THtmlRenderer;

class TemplateRepeat extends TPage {
    public function __construct() {
        parent::__construct();
        try {
            $template = new THtmlRenderer("app/resources/template-repeat.html");
            $template->enableSection('main');
            $template->enableSection("detalhes", [
                [
                    'id' => 1,
                    'nome' => "fernando",
                    'endereco' => "fernando@gmail.com"
                ]
            ], true);
            parent::add($template);
        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }
}
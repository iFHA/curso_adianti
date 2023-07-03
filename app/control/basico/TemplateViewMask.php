<?php

use Adianti\Control\TPage;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Template\THtmlRenderer;

class TemplateViewMask extends TPage {
    public function __construct() {
        parent::__construct();

        try {

            $template = new THtmlRenderer("app/resources/template-view-mask.html");
            $replaces = [
                'date' => date('Y-m-d'),
                'datetime' => date('Y-m-d H:i:s'),
                'number' => 12345.67,
                'value1' => 123,
                'value2' => 34,
                'value3' => 10
            ];

            $template->enableSection('main', $replaces);
            parent::add($template);

        } catch (Exception $e) {
            new TMessage("error", $e->getMessage());
        }
    }
}
<?php

use Adianti\Control\TPage;
use Adianti\Widget\Base\TScript;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Template\THtmlRenderer;

class TemplateSidebarView extends TPage {
    public function __construct() {
        parent::__construct();
        parent::setTargetContainer("adianti_right_panel");
// 
        try {
            $html = new THtmlRenderer('app/resources/template-modal2.html');
            $html->enableSection('main', []);
            parent::add($html);
        } catch(Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }
    public static function onClose() {
        TScript::create('Template.closeRightPanel()');
    }
}
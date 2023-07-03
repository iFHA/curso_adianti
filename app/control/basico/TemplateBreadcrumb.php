<?php

use Adianti\Control\TPage;
use Adianti\Widget\Container\TVBox;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Template\THtmlRenderer;
use Adianti\Widget\Util\TBreadCrumb;
use Adianti\Widget\Util\TXMLBreadCrumb;

class TemplateBreadcrumb extends TPage {
    public function __construct () {
        parent::__construct();
        try {
            $template = new THtmlRenderer('app/resources/template-breadcrumb.html');
            $template->enableSection('main');
            $vbox = new TVBox();
            $vbox->style = "width:100%";
            $vbox->add(new TXMLBreadCrumb("menu.xml", __CLASS__));
            $vbox->add($template);
            parent::add($vbox);
        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }
}
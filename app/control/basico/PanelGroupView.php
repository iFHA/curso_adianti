<?php

use Adianti\Control\TPage;
use Adianti\Widget\Container\TPanelGroup;

class PanelGroupView extends TPage {
    public function __construct() {
        parent::__construct();

        $panel = new TPanelGroup("Título do Panel");
        $panel->add("teste");
        $panel->addFooter("teste footer");
        parent::add($panel);
    }
}
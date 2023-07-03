<?php

use Adianti\Control\TPage;
use Adianti\Widget\Base\TElement;

class TemplateEmbeddedPdf extends TPage {
    public function __construct () {
        parent::__construct();

        $object = new TElement("iframe");
        $object->width = "100%";
        $object->height = "600px";
        $object->src = "https://www.africau.edu/images/default/sample.pdf";
        $object->type = "application/pdf";

        parent::add($object);
    }
}
<?php

namespace Framework\Templates;

use League\Plates\Engine as PlatesEngine;

class PlatesRenderer implements Renderer
{
    private $engine;

    public function __construct(PlatesEngine $engine)
    {
        $this->engine = $engine;
    }

    public function render($template, $data = [])
    {
        return $this->engine->render($template, $data);
    }
}

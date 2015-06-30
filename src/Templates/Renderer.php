<?php

namespace Framework\Templates;

interface Renderer
{

    /**
     * @param $template
     * @param array $data
     * @return mixed
     */
    public function render($template, $data = []);
}

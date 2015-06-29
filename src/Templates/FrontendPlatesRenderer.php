<?php

namespace Framework\Templates;


class FrontendPlatesRenderer implements FrontendRenderer
{

    private $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param $template
     * @param array $data
     * @return mixed
     */
    public function render($template, $data = [ ])
    {
        $data = array_merge($data, [
            'menuItems' => [ [ 'href' => '/', 'text' => 'Homepage' ] ],
        ]);

        return $this->renderer->render($template, $data);
    }
}
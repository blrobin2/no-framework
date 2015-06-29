<?php

namespace Framework\Controllers;

use Framework\Http\Request;
use Framework\Http\Response;
use Framework\Templates\FrontendRenderer;

class Homepage
{

    private $request;
    private $response;
    private $renderer;

    public function __construct(Request $request, Response $response, FrontendRenderer $renderer)
    {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }

    public function show()
    {
        $data = [
            'name' => $this->request->query->get('name', 'Stranger'),
        ];

        $html = $this->renderer->render('home', $data);
        $this->response->setContent($html);
    }
}
<?php

namespace Framework\Controllers;

use Framework\Http\Request;
use Framework\Http\Response;

class Homepage
{
    private $request;
    private $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function show()
    {
        $content = '<h1>Hello World</h1>';
        $content .= 'Hello '.$this->request->query->get('name', 'Stranger');

        $this->response->setContent($content);
    }
}
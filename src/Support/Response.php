<?php

namespace MacsiDigital\LiveAgent\Support;

use GuzzleHttp\Psr7\Response as GuzzleResponse;

class Response
{
    protected $response;

    public function __construct()
    {
        $this->response = new GuzzleResponse;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getBody()
    {
        return json_decode($this->response->getBody(), true);
    }

    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }
}

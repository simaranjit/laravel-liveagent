<?php

namespace MacsiDigital\LiveAgent\Interfaces;

use MacsiDigital\LiveAgent\Support\Request;

class PrivateApplication extends Base
{
    protected $request;

    public function __construct()
    {
        $this->request = (new Request)->bootPrivateApplication();
    }

    public function ping()
    {
        try {
            return $this->request->ping();
        } catch (Exception $e) {
            return $e->getResponse();
        }
    }
}

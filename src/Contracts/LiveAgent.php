<?php

namespace MacsiDigital\LiveAgent\Contracts;

interface LiveAgent
{
    public function __construct($type = 'Private');

    public function getClient();

    public function __get($key);

    public function getNode($key);

}

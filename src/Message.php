<?php

namespace MacsiDigital\LiveAgent;

use MacsiDigital\LiveAgent\Support\Model;

class Message extends Model
{
    const ENDPOINT = 'messages';
    const NODE_NAME = 'Messages';
    const KEY_FIELD = 'id';

    protected $methods = ['get'];

    protected $queryAttributes = [
        'includeQuotedMessages',
    ];

    protected $attributes = [
        'id' => '',
        'userid' => '',
        'type' => '',
        'datecreated' => '',
        'format' => '',
        'message' => '',
        'visibility' => '',
    ];
}

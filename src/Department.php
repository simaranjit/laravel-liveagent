<?php

namespace MacsiDigital\LiveAgent;

use MacsiDigital\LiveAgent\Support\Model;

class Department extends Model
{
    const ENDPOINT = 'departments';
    const NODE_NAME = 'Departments';
    const KEY_FIELD = 'department_id';

    protected $methods = ['get'];

    protected $queryAttributes = [

    ];

    protected $attributes = [
        'department_id' => '',
        'agent_count' => '',
        'name' => '',
        'online_status' => '',
        'agent_ids' => '',
        'mailaccount_id' => '',
    ];
}

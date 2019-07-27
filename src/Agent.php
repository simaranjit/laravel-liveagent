<?php

namespace MacsiDigital\LiveAgent;

use MacsiDigital\LiveAgent\Support\Model;

class Agent extends Model
{
    const ENDPOINT = 'agents';
    const NODE_NAME = 'Agents';
    const KEY_FIELD = 'id';

    protected $methods = ['get'];

    protected $queryAttributes = [
        'email',
    ];

    protected $attributes = [
        'id' => '',
        'name' => '',
        'email' => '',
        'role' => '',
        'avatar_uri' => '',
        'online_status' => '',
        'status' => '',
        'gender' => '',
    ];

    public function logout()
    {
        $this->client->post($this->getEndpoint().'/'.$this->getID().'/_logout', []);
    }

    public function pause()
    {
        $this->client->post($this->getEndpoint().'/'.$this->getID().'/_pause', []);
    }

    public function status()
    {
        return $this->client->get($this->getEndpoint().'/'.$this->getID().'/_status')->getContents();
    }

    public function activity()
    {
        return $this->client->get($this->getEndpoint().'/activity')->getContents();
    }
}

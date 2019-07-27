<?php

namespace MacsiDigital\LiveAgent;

use MacsiDigital\LiveAgent\Support\Model;

class Ticket extends Model
{
    const ENDPOINT = 'tickets';
    const NODE_NAME = 'Tickets';
    const KEY_FIELD = 'id';

    protected $methods = ['get', 'post', 'put', 'delete'];

    protected $queryAttributes = [
        'owner_email',
    ];

    protected $attributes = [
        'id' => '',
        'owner_contactid' => '',
        'owner_email' => '',
        'owner_name' => '',
        'departmentid' => '',
        'agentid' => '',
        'status' => '',
        'tags' => '',
        'code' => '',
        'channel_type' => '',
        'date_created' => '',
        'date_changed' => '',
        'date_resolved' => '',
        'date_due' => '',
        'date_deleted' => '',
        'last_activity' => '',
        'last_activity_public' => '',
        'public_access_urlcode' => '',
        'subject' => '',
        'custom_fields' => [],
    ];

    protected $createAttributes = [
        'useridentifier',
        'subject',
        'departmentid',
        'recipient',
        'message',
        'date_created',
        'recipient_name',
        'carbon_copy',
        'blind_carbon_copy',
        'status',
        'mail_message_id',
        'do_not_send_mail',
        'use_template',
        'is_html_message',
        'custom_fields',
        'tags',
        'attachments',
    ];

    protected $updateAttributes = [
        'owner_contactid',
        'departmentid',
        'agentid',
        'status',
        'tags',
        'date_created',
    ];

    public function history()
    {
        return $this->client->get($this->getEndpoint().'/'.$this->getID().'/history')->getContents();
    }

    public function messageGroup()
    {
        $response = $this->client->get($this->getEndpoint().'/'.$this->getID().'/messages');
        if ($response->getStatusCode() == '200') {
            return (new MessageGroup)->collect($response->getBody());
        } else {
            throw new Exception('Status Code '.$this->response->getStatusCode().': '.$this->response->getBody()['message']);
        }
    }
}

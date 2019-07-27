<?php

namespace MacsiDigital\LiveAgent;

use MacsiDigital\LiveAgent\Support\Model;

class TicketListItem extends Model
{
    const ENDPOINT = 'tickets';
    const NODE_NAME = 'Tickets';

    protected $methods = ['post'];

    protected $attributes = [
        'useridentifier' => '',
        'subject' => '',
        'departmentid' => '',
        'recipient' => '',
        'message' => '',
        'date_created' => '',
        'recipient_name' => '',
        'carbon_copy' => '',
        'blind_carbon_copy' => '',
        'status' => 'N',
        'mail_message_id' => '',
        'do_not_send_mail' => 'N',
        'use_template' => 'N',
        'is_html_message' => 'N',
        'custom_fields' => [],
        'tags' => [],
        'attachments' => ''
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
        'attachments'
    ];

    public function setUserID($user_id)
    {
        $this->useridentifier = $user_id;

        return $this;
    }

    public function make($attributes)
    {
        $model = new static;
        $model->fill($attributes);
        if ($this->useridentifier != '') {
            $model->setUserID($this->useridentifier);
        }

        return $model;
    }

}

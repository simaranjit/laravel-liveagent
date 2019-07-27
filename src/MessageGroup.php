<?php

namespace MacsiDigital\LiveAgent;

use MacsiDigital\LiveAgent\Support\Model;

class MessageGroup extends Model
{
    protected $attributes = [
        'id' => '',
        'parent_id' => '',
        'userid' => '',
        'user_full_name' => '',
        'type' => '',
        'status' => '',
        'datecreated' => '',
        'datefinished' => '',
        'sort_order' => '',
        'mail_msg_id' => '',
        'pop3_msg_id' => '',
        'messages' => [],
    ];

    protected $relationships = [
        'messages' => '\MacsiDigital\LiveAgent\Message',
    ];

    public function messages()
    {
        return (new Message)->collect($this->messages);
    }
}

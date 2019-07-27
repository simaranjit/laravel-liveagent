<?php

namespace MacsiDigital\LiveAgent;

use MacsiDigital\LiveAgent\Ticket;
use MacsiDigital\LiveAgent\Support\Model;

class Contact extends Model
{
    const ENDPOINT = 'contacts';
    const NODE_NAME = 'Contacts';
    const KEY_FIELD = 'id';

    protected $methods = ['get', 'post', 'put', 'patch', 'delete'];

    protected $queryAttributes = [
        'system_name'
    ];

    protected $attributes = [
        'id' => '',
        'company_id' => '',
        'firstname' => '',
        'lastname' => '',
        'system_name' => '',
        'description' => '',
        'avatar_url' => '',
        'type' => '',
        'gender' => 'X',
        'date_created' => '',
        'date_changed' => '',
        'language' => '',
        'city' => '',
        'countrycode' => '',
        'ip' => '',
        'registration_email' => '',
        'emails' => [],
        'phones' => [],
        'groups' => [],
        'job_postion' => '',
        'note' => '',
        'useragent' => '',
        'screen' => '',
        'time_offset' => '',
        'latitude' => '',
        'longitude' => '',
        'custom_fields' => [],
    ];

    protected $createAttributes = [
        'id',
        'comapny_id',
        'firstname',
        'lastname',
        'system_name',
        'description',
        'avatar_url',
        'type',
        'gender',
        'date_created',
        'date_changed',
        'language',
        'city',
        'countrycode',
        'ip',
        'registration_email',
        'emails',
        'phones',
        'groups',
        'job_postion',
        'note',
        'useragent',
        'screen',
        'time_offset',
        'latitude',
        'longitude',
        'custom_fields',
    ];

    protected $updateAttributes = [
        'id',
        'comapny_id',
        'firstname',
        'lastname',
        'system_name',
        'description',
        'avatar_url',
        'type',
        'gender',
        'date_created',
        'date_changed',
        'language',
        'city',
        'countrycode',
        'ip',
        'registration_email',
        'emails',
        'phones',
        'groups',
        'job_postion',
        'note',
        'useragent',
        'screen',
        'time_offset',
        'latitude',
        'longitude',
        'custom_fields',
    ];

    public function tickets() 
    {
        return (new Ticket)->where('owner_email', $this->registration_email);
    }

}

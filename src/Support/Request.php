<?php

namespace MacsiDigital\LiveAgent\Support;

use Exception;
use GuzzleHttp\Client;

class Request
{
    protected $client;

    public function bootPrivateApplication()
    {
        $options = [
            'base_uri' => config('liveagent.api_url'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'apikey' => config('liveagent.api_key')
            ]
        ];
        $this->client = new Client($options);

        return $this;
    }

    public function ping()
    {
        try {
            return $this->client->request('GET', 'ping');    
        } catch (Exception $e) {
            return $e->getResponse();
        }
    }

    public function get($end_point)
    {
        try {
            return $this->client->request('GET', $end_point);
        } catch (Exception $e) {
            return $e->getResponse();
        }
    }

    public function post($end_point, $fields)
    {
        try {
            return $this->client->post($end_point, [
                'body' => $this->prepareFields($fields),
            ]);
        } catch (Exception $e) {
            return $e->getResponse();
        }
    }

    public function put($end_point, $fields)
    {
        try {
            return $this->client->put($end_point, [
                'body' => $this->prepareFields($fields),
            ]);
        } catch (Exception $e) {
            return $e->getResponse();
        }
    }

    public function delete($end_point)
    {
        try {
            return $this->client->delete($end_point);
        } catch (Exception $e) {
            return $e->getResponse();
        }
    }

    private function prepareFields($fields)
    {
        $return = [];
        foreach ($fields as $key => $value) {
            if ($value != [] && $value != '') {
                if (is_array($value)) {
                    foreach ($value as $sub_key => $object) {
                        if (is_object($object)) {
                            if (is_array($fields[$key][$sub_key])) {
                                $return[$key][$sub_key][] = $object->getAttributes();
                            } else {
                                $return[$key][$sub_key] = $object->getAttributes();
                            }
                        } else {
                            if (is_array($fields[$key][$sub_key])) {
                                $return[$key][$sub_key][] = $object;
                            } else {
                                $return[$key][$sub_key] = $object;
                            }
                        }
                    }
                } else {
                    if (is_object($value)) {
                        if (is_array($fields[$key])) {
                            $return[$key][] = $value->getAttributes();
                        } else {
                            $return[$key] = $value->getAttributes();
                        }
                    } else {
                        if (is_array($fields[$key])) {
                            $return[$key][] = $value;
                        } else {
                            $return[$key] = $value;
                        }
                    }
                }
            }
        }

        return json_encode($return);
    }
}

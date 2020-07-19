<?php

return [
    /**
     * Your company ID from UDS
     */
    'id' => env('UDS_ID'),
    /**
     * Your API Key from UDS
     */
    'key' => env('UDS_KEY'),
    /**
     * This is the API URI path where Uds will be accessible from. Feel free
     * to change this path to anything you like.
     */
    'path' => env('UDS_PATH', 'api/uds'),
    /**
     * These middleware will be assigned to every Uds route, giving you
     * the chance to add your own middleware to this list or change any of
     * the existing middleware. Or, you can simply stick with this list.
     */
    'middleware' => [
        'api',
        // 'auth:api'
    ],
];

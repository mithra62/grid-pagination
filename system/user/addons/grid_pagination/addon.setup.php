<?php

use Mithra62\GridPagination\Services\GridService;
use Mithra62\GridPagination\Services\EntryService;
use Mithra62\GridPagination\Services\ChannelService;

return [
    'name'              => 'grid_pagination',
    'description'       => 'grid_pagination description',
    'version'           => '0.1.0',
    'author'            => 'Eric Lamb',
    'author_url'        => 'fdsa',
    'namespace'         => 'Mithra62\GridPagination',
    'settings_exist'    => false,
    'services' => [
        'GridService' => function ($addon) {
            return new GridService();
        },
        'EntryService' => function ($addon) {
            return new EntryService();
        },
        'ChannelService' => function ($addon) {
            return new ChannelService();
        },
    ],
    'requires'       => [
        'php'   => '8.0',
    ]
];

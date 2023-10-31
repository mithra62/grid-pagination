<?php

use Mithra62\GridPagination\Services\GridService;
use Mithra62\GridPagination\Services\EntryService;
use Mithra62\GridPagination\Services\ChannelService;

const GRID_PAGINATION_VERSION = '1.1.1';

return [
    'name'              => 'Grid Pagination',
    'description'       => 'Adds the ability to pagination Grid results in template tags',
    'version'           => GRID_PAGINATION_VERSION,
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

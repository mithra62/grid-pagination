<?php

use Mithra62\Grid\Pagination\Services\GridService;
use Mithra62\Grid\Pagination\Services\EntryService;
use Mithra62\Grid\Pagination\Services\ChannelService;

const GRID_PAGINATION_VERSION = '1.0.0';

return [
    'name'              => 'Grid Pagination',
    'description'       => 'Adds the ability to pagination Grid results in template tags',
    'version'           => GRID_PAGINATION_VERSION,
    'author'            => 'Eric Lamb',
    'author_url'        => 'https://github.com/mithra62/grid-pagination',
    'namespace'         => 'Mithra62\Grid\Pagination',
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

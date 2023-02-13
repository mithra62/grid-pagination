<?php

use Mithra62\GridPagination\Services\GridService;

return [
    'name'              => 'grid_pagination',
    'description'       => 'grid_pagination description',
    'version'           => '1.0.0',
    'author'            => 'Eric Lamb',
    'author_url'        => 'fdsa',
    'namespace'         => 'Mithra62\GridPagination',
    'settings_exist'    => false,
    'services' => [
        'GridService' => function ($addon) {
            return new GridService();
        },
    ]
];

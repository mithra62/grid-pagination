<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use ExpressionEngine\Service\Addon\Mcp;

class Grid_pagination_mcp extends Mcp
{
    protected $addon_name = 'grid_pagination';
}

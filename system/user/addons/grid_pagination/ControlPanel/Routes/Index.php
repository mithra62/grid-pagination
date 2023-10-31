<?php

namespace Mithra62\GridPagination\ControlPanel\Routes;

use ExpressionEngine\Service\Addon\Controllers\Mcp\AbstractRoute;

class Index extends AbstractRoute
{
    /**
     * @var string
     */
    protected $route_path = 'index';

    /**
     * @var string
     */
    protected $cp_page_title = 'Index';

    /**
     * @param false $id
     * @return AbstractRoute
     */
    public function process($id = false)
    {
        redirect();
        exit;
    }
}

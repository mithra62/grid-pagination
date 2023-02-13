<?php

namespace Mithra62\GridPagination\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;

class Pagination extends AbstractRoute
{
    public function process()
    {
        ee()->load->library('pagination');
        $pagination = ee()->pagination->create();

        ee()->TMPL->tagdata = $pagination->prepare(ee()->TMPL->tagdata);
    }
}

<?php

namespace EricLamb\GridPagination\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;

class Pagination extends AbstractRoute
{
    // Example tag: {exp:grid_pagination:pagination}
    public function process()
    {
        $offset_key = ee()->TMPL->fetch_param('offset_key', 'offset');
        $limit_key = ee()->TMPL->fetch_param('limit_key', 'limit');
        $offset = ee()->input->get_post($offset_key);
        if(!$offset) {
            $offset = ee()->TMPL->fetch_param('offset', 0);
        }

        $limit = ee()->input->get_post($limit_key);
        if(!$limit) {
            $limit = ee()->TMPL->fetch_param('limit', \PHP_INT_MAX);
        }

        $tagVars = [
            'grid_offset' => $offset,
            'grid_limit' => $limit
        ];

        return ee()->TMPL->parse_variables_row(ee()->TMPL->tagdata, $tagVars);
    }
}

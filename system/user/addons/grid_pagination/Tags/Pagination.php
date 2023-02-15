<?php

namespace Mithra62\GridPagination\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;

class Pagination extends AbstractRoute
{
    public function process()
    {
        $field_id = ee()->TMPL->fetch_param('field_id', false);
        $entry_id = ee()->TMPL->fetch_param('entry_id', false);
        $limit = ee()->TMPL->fetch_param('limit', \PHP_INT_MAX);
        $prefix = ee()->TMPL->fetch_param('prefix', 'G');
        if(!$field_id || !$entry_id) {
            return 'missing field_id or entry_id parameters';
        }

        ee()->load->library('pagination');
        $pagination = ee()->pagination->create();

        ee()->TMPL->tagdata = $pagination->prepare(ee()->TMPL->tagdata);
        $pagination->prefix = $prefix;

        $total_items = ee('grid_pagination:GridService')->getTotalRows($entry_id, $field_id);
        $per_page = $limit;
        $pagination->build($total_items, $per_page);
        return $pagination->render(ee()->TMPL->tagdata);
    }
}

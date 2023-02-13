<?php

namespace Mithra62\GridPagination\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;

class FieldParams extends AbstractRoute
{
    /**
     * @return string
     */
    public function process()
    {
        $offset_key = ee()->TMPL->fetch_param('offset_key', 'offset');
        $limit_key = ee()->TMPL->fetch_param('limit_key', 'limit');
        $field_id = ee()->TMPL->fetch_param('field_id', false);
        $entry_id = ee()->TMPL->fetch_param('entry_id', false);
        if(!$field_id || !$entry_id) {
            return 'missing field_id or entry_id parameters';
        }

        $offset = ee()->input->get_post($offset_key);
        if(!$offset) {
            $offset = ee()->TMPL->fetch_param('offset', 0);
        }

        $limit = ee()->input->get_post($limit_key);
        if(!$limit) {
            $limit = ee()->TMPL->fetch_param('limit', \PHP_INT_MAX);
        }

        $tagVars = [
            'grid:offset' => $offset,
            'grid:limit' => $limit
        ];

        return ee()->TMPL->parse_variables_row(ee()->TMPL->tagdata, $tagVars);
    }
}
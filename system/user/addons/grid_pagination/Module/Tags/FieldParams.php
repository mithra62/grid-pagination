<?php

namespace Mithra62\GridPagination\Module\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;

class FieldParams extends AbstractRoute
{
    /**
     * @return string
     */
    public function process()
    {
        $field_id = ee()->TMPL->fetch_param('field_id', false);
        $entry_id = ee()->TMPL->fetch_param('entry_id', false);
        $url_title = ee()->TMPL->fetch_param('url_title', false);
        $channel_shortname = ee()->TMPL->fetch_param('channel', false);
        $limit = ee()->TMPL->fetch_param('limit', \PHP_INT_MAX);
        $url_segment = ee()->TMPL->fetch_param('url_segment', 3);
        $prefix = ee()->TMPL->fetch_param('prefix', 'G');

        if(!$entry_id) {
            $entry_id = ee('grid_pagination:EntryService')->getEntryId($url_title, $channel_shortname);
        }

        if(!$field_id || !$entry_id) {
            return 'missing field_id or entry_id parameters';
        }

        $segment = ee()->uri->segment($url_segment);
        $offset = str_replace($prefix, '', $segment);
        if(!$offset) {
            $offset = 0;
        }

        $tagVars = [
            'grid:offset' => $offset,
            'grid:limit' => $limit
        ];

        return ee()->TMPL->parse_variables_row(ee()->TMPL->tagdata, $tagVars);
    }
}
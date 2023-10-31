<?php
namespace Mithra62\Grid\Pagination\Services;

use CI_DB_result;

class EntryService
{
    /**
     * @param string $url_title
     * @param string $channel_shortname
     * @return int
     */
    public function getEntryId(string $url_title, string $channel_shortname)
    {
        $channel_id = ee('grid_pagination:ChannelService')->getChannelId($channel_shortname);
        $data = ee()->db->select('entry_id')->from('channel_titles')
            ->where(['url_title' => $url_title, 'channel_id' => $channel_id])
            ->get();

        $return = 0;
        if($data instanceof CI_DB_result && $data->num_rows() >= 1) {
            $return = $data->row('entry_id');
        }

        return $return;
    }
}
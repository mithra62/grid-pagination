<?php
namespace Mithra62\GridPagination\Services;

use CI_DB_result;

class ChannelService
{
    /**
     * @param string $channel_shortname
     * @return int
     */
    public function getChannelId(string $channel_shortname): int
    {
        $data = ee()->db->select('channel_id')->from('channels')
            ->where(['channel_name' => $channel_shortname])
            ->get();

        $return = 0;
        if($data instanceof CI_DB_result) {
            $return = $data->row('channel_id');
        }

        return $return;
    }
}
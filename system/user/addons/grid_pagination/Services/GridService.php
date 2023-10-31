<?php
namespace Mithra62\Grid\Pagination\Services;

class GridService
{
    /**
     * @param int $entry_id
     * @param int $field_id
     * @return int
     */
    public function getTotalRows(int $entry_id, int $field_id): int
    {
        $return = 0;
        $table_name = 'channel_grid_field_' . $field_id;
        if (ee()->db->table_exists($table_name)) {
            $where = [
                'entry_id' => $entry_id,
            ];

            $data = ee()->db->select('COUNT(`row_id`) AS total_rows')->from($table_name)->where($where)->get();
            if($data) {
                $return = $data->row('total_rows');
            }
        }

        return $return;
    }
}
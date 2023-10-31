<?php
namespace Mithra62\Grid\Pagination\Tests;

use CI_DB_result;

trait ContentTrait
{
    /**
     * @var string|null
     */
    protected ?string $channel_name = null;

    /**
     * @var int
     */
    protected int $channel_id = 0;

    /**
     * @var int
     */
    protected int $grid_field_id = 0;

    /**
     * @var int
     */
    protected int $grid_entry_id = 0;

    /**
     * @var int
     */
    protected int $grid_total_rows = 0;

    /**
     * @return void
     */
    protected function setupChannel(): void
    {
        if(is_null($this->channel_name)) {
            $data = ee()->db->select('channel_id, channel_name')->from('channels')
                ->limit(1)
                ->get();

            if($data instanceof CI_DB_result && $data->num_rows() == 1) {
                $this->channel_id = $data->row('channel_id');
                $this->channel_name = $data->row('channel_name');
            }
        }
    }

    /**
     * @return void
     */
    protected function setupGridEntry(): void
    {
        if($this->grid_field_id === 0) {
            $data = ee()->db->select('field_id')->from('grid_columns')
                ->group_by('field_id')
                ->get();

            if($data instanceof CI_DB_result && $data->num_rows() >= 1) {
                foreach($data->result_array() AS $row) {
                    $table_name = 'channel_grid_field_' . $row['field_id'];
                    if (ee()->db->table_exists($table_name)) {
                        $total = ee()->db->select('COUNT(row_id) AS total_rows, entry_id')->from($table_name)->group_by('entry_id')->get();
                        if($total instanceof CI_DB_result && $total->num_rows() >= 1) {
                            $this->grid_field_id = $row['field_id'];
                            $this->grid_total_rows = $total->row('total_rows');
                            $this->grid_entry_id = $total->row('entry_id');
                            break;
                        }
                    }
                }
            }
        }
    }
}
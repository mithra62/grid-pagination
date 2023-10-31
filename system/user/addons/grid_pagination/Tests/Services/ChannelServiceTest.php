<?php
namespace Mithra62\Grid\Pagination\Tests\Services;

use PHPUnit\Framework\TestCase;
use Mithra62\Grid\Pagination\Services\ChannelService;
use CI_DB_result;

class ChannelServiceTest extends TestCase
{
    /**
     * @var null
     */
    protected $channel_name = null;

    /**
     * @var int
     */
    protected $channel_id = 0;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->setupChannel();
    }

    /**
     * @return array|mixed|object
     */
    protected function setupChannel()
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

        return $this->channel_name;
    }

    public function testClassExists()
    {
        $this->assertTrue(class_exists('Mithra62\Grid\Pagination\Services\ChannelService'));;
    }

    /**
     * @return ChannelService
     */
    public function testGetChannelIdBadChannelNameReturnsZero(): ChannelService
    {
        $channel_service = new ChannelService();
        $this->assertEquals(0, $channel_service->getChannelId(rand()));
        return $channel_service;
    }

    /**
     * @depends testGetChannelIdBadChannelNameReturnsZero
     * @param ChannelService $channel_service
     * @return ChannelService
     */
    public function testGetChannelIdReturnsValidChannelId(ChannelService $channel_service): ChannelService
    {
        $this->assertEquals($this->channel_id, $channel_service->getChannelId($this->channel_name));
        return $channel_service;
    }
}
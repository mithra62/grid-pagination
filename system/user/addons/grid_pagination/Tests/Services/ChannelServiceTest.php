<?php
namespace Mithra62\Grid\Pagination\Tests\Services;

use PHPUnit\Framework\TestCase;
use Mithra62\Grid\Pagination\Services\ChannelService;
use Mithra62\Grid\Pagination\Tests\ContentTrait;
use \Exception;

class ChannelServiceTest extends TestCase
{
    use ContentTrait;

    public function setup(): void
    {
        $this->setupChannel();
        if($this->channel_id === 0) {
            throw new Exception("No Channels are setup!");
        }
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
<?php
namespace Mithra62\Grid\Pagination\Tests\Services;

use PHPUnit\Framework\TestCase;
use Mithra62\Grid\Pagination\Services\EntryService;
use Mithra62\Grid\Pagination\Tests\ContentTrait;
use \Exception;

class EntryServiceTest extends TestCase
{
    use ContentTrait;

    public function setup(): void
    {
        $this->setupEntry();
        if(is_null($this->url_title)) {
            throw new Exception("No entries are setup to test against!");
        }
    }

    /**
     * @return void
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Mithra62\Grid\Pagination\Services\EntryService'));
    }

    /**
     * @return EntryService
     * @throws Exception
     */
    public function testGetEntryIdReturnsZeroOnBadRequest(): EntryService
    {
        $service = new EntryService;
        $this->assertEquals(0, $service->getEntryId(random_bytes(10), rand()));
        return $service;
    }

    /**
     * @depends testGetEntryIdReturnsZeroOnBadRequest
     * @param EntryService $service
     * @return EntryService
     */
    public function testGetEntryIdReturnsAccurateEntryId(EntryService $service): EntryService
    {
        $this->assertEquals($this->entry_id, $service->getEntryId($this->url_title, $this->channel_name));
        return $service;
    }
}
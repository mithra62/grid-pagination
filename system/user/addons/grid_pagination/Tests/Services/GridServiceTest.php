<?php
namespace Mithra62\Grid\Pagination\Tests\Services;

use PHPUnit\Framework\TestCase;
use Mithra62\Grid\Pagination\Services\GridService;
use Mithra62\Grid\Pagination\Tests\ContentTrait;
use \Exception;

class GridServiceTest extends TestCase
{
    use ContentTrait;

    /**
     * @return void
     * @throws Exception
     */
    public function setup(): void
    {
        $this->setupGridEntry();
        if($this->grid_total_rows === 0) {
            throw new Exception("No Grid Fields are setup!");
        }
    }

    /**
     * @return void
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Mithra62\Grid\Pagination\Services\GridService'));
    }

    /**
     * @return GridService
     */
    public function testGetTotalRowsReturnsZeroOnBadQuery(): GridService
    {
        $service = new GridService();
        $this->assertEquals(0, $service->getTotalRows(rand(), rand()));
        return $service;
    }

    /**
     * @depends testGetTotalRowsReturnsZeroOnBadQuery
     * @param GridService $service
     * @return GridService
     */
    public function testGetTotalRowsReturnsAccurateCount(GridService $service): GridService
    {
        $this->assertEquals($this->grid_total_rows, $service->getTotalRows($this->grid_entry_id, $this->grid_field_id));
        return $service;
    }
}
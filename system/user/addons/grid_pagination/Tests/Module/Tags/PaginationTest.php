<?php
namespace Mithra62\Grid\Pagination\Tests\Module\Tags;

use PHPUnit\Framework\TestCase;
use Mithra62\Grid\Pagination\Module\Tags\Pagination;

class PaginationTest extends TestCase
{
    /**
     * @return void
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Mithra62\Grid\Pagination\Module\Tags\Pagination'));
    }

    public function testTagInstance()
    {
        $this->assertInstanceOf('ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute', new Pagination);
    }
}
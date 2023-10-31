<?php
namespace Mithra62\Grid\Pagination\Tests\Module\Tags;

use PHPUnit\Framework\TestCase;
use Mithra62\Grid\Pagination\Module\Tags\FieldParams;

class FieldParamsTest extends TestCase
{
    /**
     * @return void
     */
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Mithra62\Grid\Pagination\Module\Tags\FieldParams'));
    }

    public function testTagInstance()
    {
        $this->assertInstanceOf('ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute', new FieldParams);
    }
}
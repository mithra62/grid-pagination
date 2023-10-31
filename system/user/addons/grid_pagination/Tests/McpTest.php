<?php

namespace Mithra62\Grid\Pagination\Tests;

use PHPUnit\Framework\TestCase;

class McpTest extends TestCase
{
    public function testMcpFileExists()
    {
        $file_name = realpath(PATH_THIRD.'/grid_pagination/mcp.grid_pagination.php');
        $this->assertNotNull($file_name);
        require_once $file_name;
    }

    public function testMcpObjectExists()
    {
        $this->assertTrue(class_exists('\Grid_pagination_mcp'));
    }
}
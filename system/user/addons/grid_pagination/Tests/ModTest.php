<?php

namespace Mithra62\Grid\Pagination\Tests;

use PHPUnit\Framework\TestCase;

class ModTest extends TestCase
{
    public function testModuleFileExists()
    {
        $file_name = realpath(PATH_THIRD.'/grid_pagination/mod.grid_pagination.php');
        $this->assertNotNull($file_name);
        require_once $file_name;
    }

    public function testModuleObjectExists()
    {
        $this->assertTrue(class_exists('\Grid_pagination'));
    }
}
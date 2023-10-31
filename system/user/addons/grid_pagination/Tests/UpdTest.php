<?php

namespace Mithra62\Grid\Pagination\Tests;

use PHPUnit\Framework\TestCase;
use ExpressionEngine\Service\Addon\Installer;
use Grid_pagination_upd;

class UpdTest extends TestCase
{
    public function testUpdFileExists()
    {
        $file_name = realpath(PATH_THIRD.'/grid_pagination/upd.grid_pagination.php');
        $this->assertNotNull($file_name);
        require_once $file_name;
    }

    public function testUpdObjectExists(): void
    {
        $this->assertTrue(class_exists('\Grid_pagination_upd'));
    }

    /**
     * @return Grid_pagination_upd
     */
    public function testHasCpBackendPropertyExists(): Grid_pagination_upd
    {
        $cp = new \Grid_pagination_upd();
        $this->assertObjectHasAttribute('has_cp_backend', $cp);
        return $cp;
    }

    /**
     * @depends testHasCpBackendPropertyExists
     * @param Grid_pagination_upd $cp
     * @return Grid_pagination_upd
     */
    public function testCpBackendPropertyValue(Grid_pagination_upd $cp): Grid_pagination_upd
    {
        $this->assertEquals('n', $cp->has_cp_backend);
        return $cp;
    }

    /**
     * @depends testCpBackendPropertyValue
     * @return Grid_pagination_upd
     */
    public function testPublishFieldsPropertyExists(Grid_pagination_upd $cp): Grid_pagination_upd
    {
        $this->assertObjectHasAttribute('has_publish_fields', $cp);
        return $cp;
    }

    /**
     * @depends testPublishFieldsPropertyExists
     * @param Grid_pagination_upd $cp
     * @return Grid_pagination_upd
     */
    public function testPublishFieldsPropertyValue(Grid_pagination_upd $cp): Grid_pagination_upd
    {
        $this->assertEquals('n', $cp->has_publish_fields);
        return $cp;
    }

    /**
     * @depends testPublishFieldsPropertyValue
     * @param Grid_pagination_upd $cp
     * @return Grid_pagination_upd
     */
    public function testInstance(Grid_pagination_upd $cp): Grid_pagination_upd
    {
        $this->assertInstanceOf('ExpressionEngine\Service\Addon\Installer', new Grid_pagination_upd);
        return $cp;
    }

    /**
     * @depends testInstance
     * @param Grid_pagination_upd $cp
     * @return Grid_pagination_upd
     */
    public function testInstallMethodExists(Grid_pagination_upd $cp): Grid_pagination_upd
    {
        $this->assertTrue(method_exists($cp, 'install'));
        return $cp;
    }

    /**
     * @depends testInstallMethodExists
     * @param Grid_pagination_upd $cp
     * @return Grid_pagination_upd
     */
    public function testUninstallMethodExists(Grid_pagination_upd $cp): Grid_pagination_upd
    {
        $this->assertTrue(method_exists($cp, 'uninstall'));
        return $cp;
    }

    /**
     * @depends testUninstallMethodExists
     * @param Grid_pagination_upd $cp
     * @return Grid_pagination_upd
     */
    public function testUpdateMethodExists(Grid_pagination_upd $cp): Grid_pagination_upd
    {
        $this->assertTrue(method_exists($cp, 'update'));
        return $cp;
    }
}
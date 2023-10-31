<?php
namespace Mithra62\Grid\Pagination\Tests;

use ExpressionEngine\Core\Provider;
use PHPUnit\Framework\TestCase;

class AddonSetupTest extends TestCase
{
    /**
     * @return void
     */
    public function testFileExists(): void
    {
        $file_name = realpath(PATH_THIRD.'/grid_pagination/addon.setup.php');
        $this->assertNotNull($file_name);
    }

    /**
     * @return Provider
     */
    public function testAuthorValue(): Provider
    {
        $addon = ee('App')->get('grid_pagination');
        $this->assertEquals('mithra62', $addon->getAuthor());
        return $addon;
    }

    /**
     * @depends testAuthorValue
     * @param $addon
     * @return Provider
     */
    public function testNameValue($addon): Provider
    {
        $this->assertEquals('Grid Pagination', $addon->getName());
        return $addon;
    }

    /**
     * @depends testNameValue
     * @param $addon
     * @return Provider
     */
    public function testNamespaceValue($addon): Provider
    {
        $this->assertEquals('Mithra62\Grid\Pagination', $addon->getNamespace());
        return $addon;
    }

    /**
     * @depends testNamespaceValue
     * @param $addon
     * @return Provider
     */
    public function testSettingsValue($addon): Provider
    {
        $this->assertFalse($addon->get('settings_exist'));
        return $addon;
    }

    /**
     * @depends testSettingsValue
     * @param $addon
     * @return Provider
     */
    public function testVersionConstDefined($addon)
    {
        $this->assertTrue(defined('GRID_PAGINATION_VERSION'));
        return $addon;
    }

    /**
     * @depends testVersionConstDefined
     * @param $addon
     * @return Provider
     */
    public function testVersionValue($addon)
    {
        $this->assertTrue($addon->get('version') == GRID_PAGINATION_VERSION);
        return $addon;
    }
}
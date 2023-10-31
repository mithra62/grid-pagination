<?php
namespace Mithra62\Grid\Pagination\Tests;

use PHPUnit\Framework\TestCase;

class LangTest extends TestCase
{
    public function testLangFileExists(): void
    {
        $file_name = realpath(PATH_THIRD.'/grid_pagination/language/english/grid_pagination_lang.php');
        $this->assertNotNull($file_name);
    }

    public function testLangFormat(): void
    {
        $file_name = realpath(PATH_THIRD.'/grid_pagination/language/english/grid_pagination_lang.php');
        include $file_name;
        $this->assertTrue(isset($lang));
    }

    public function testNameKeyExists(): array
    {
        $file_name = realpath(PATH_THIRD.'/grid_pagination/language/english/grid_pagination_lang.php');
        $lang = [];
        include $file_name;
        $this->assertArrayHasKey('grid_pagination_module_name', $lang);
        return $lang;
    }

    /**
     * @depends testNameKeyExists
     * @param array $lang
     * @return array
     */
    public function testDescKeyExists(array $lang): array
    {
        $this->assertArrayHasKey('grid_pagination_module_description', $lang);
        return $lang;
    }

    /**
     * @depends testNameKeyExists
     * @param array $lang
     * @return array
     */
    public function testSettingKeyExists(array $lang): array
    {
        $this->assertArrayHasKey('grid_pagination_settings', $lang);
        return $lang;
    }
}
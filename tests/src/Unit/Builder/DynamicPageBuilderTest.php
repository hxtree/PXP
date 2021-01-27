<?php
/**
 * This file is part of the LivingMarkup package.
 *
 * (c) 2017-2020 Ouxsoft  <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LivingMarkup\Tests\Unit\Builder;

use LivingMarkup\Factory\ProcessorFactory;
use PHPUnit\Framework\TestCase;

class DynamicPageBuilderTest extends TestCase
{

    private $processor;

    public function setUp(): void
    {
        $this->processor = ProcessorFactory::getInstance();
        $this->processor->loadConfig(TEST_DIR . '/Resource/config/phpunit.json');
        $this->processor->setBuilder('DynamicPageBuilder');
    }

    public function tearDown(): void
    {
        unset($this->processor);
    }

    /**
     * @covers \LivingMarkup\Builder\DynamicPageBuilder::getObject
     */
    public function testGetObject()
    {
        $results = $this->processor->parseString('<html lang="en">Test</html>');
        $this->assertIsString($results);
    }

    /**
     * @covers \LivingMarkup\Builder\DynamicPageBuilder::createObject
     */
    public function testCreateObject()
    {
        $results = $this->processor->parseString('<html lang="en">Test</html>');
        $this->assertIsString($results);
    }
}

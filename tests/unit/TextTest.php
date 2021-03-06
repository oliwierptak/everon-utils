<?php declare(strict_types = 1);
/**
 * This file is part of the Everon components.
 *
 * (c) Oliwier Ptak <everonphp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\Tests\Unit;

use Everon\Component\Utils\TestCase\MockeryTest;
use Everon\Component\Utils\Tests\Unit\Doubles\TextStub;

class TextTest extends MockeryTest
{

    /**
     * @var TextStub
     */
    protected $TextStub;

    protected function setUp(): void
    {
        $this->TextStub = new TextStub();
    }

    public function test_camel_to_underscore(): void
    {
        $this->assertEquals('foo_bar', $this->TextStub->camelToUnderscore('fooBar'));
        $this->assertEquals('foo_bar', $this->TextStub->camelToUnderscore('FooBar'));
    }

    public function test_underscore_to_camel(): void
    {
        $this->assertEquals('FooBar', $this->TextStub->underscoreToCamel('foo_bar'));
        $this->assertEquals('FooBar', $this->TextStub->underscoreToCamel('foo_bar'));
    }

}

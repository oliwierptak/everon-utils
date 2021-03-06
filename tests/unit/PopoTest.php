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
use Everon\Component\Utils\Tests\Unit\Doubles\PopoStub;

class PopoTest extends MockeryTest
{

    /**
     * @var array
     */
    protected $arrayFixture = [
        'foo' => 1,
        'bar' => 'barValue',
        'fuzz_bar_foo' => null,
    ];

    /**
     * @var PopoStub
     */
    protected $Popo;

    protected function setUp(): void
    {
        $this->Popo = new PopoStub($this->arrayFixture);
    }

    public function test_get_value(): void
    {
        $this->assertEquals(1, $this->Popo->getFoo());
        $this->assertEquals('barValue', $this->Popo->getBar());
        $this->assertEquals(null, $this->Popo->getFuzzBarFoo());
    }

    public function test_set_value(): void
    {
        $this->Popo->setFoo(100);
        $this->assertEquals(100, $this->Popo->getFoo());
    }

    public function test_calling_property_twice_should_warm_cache(): void
    {
        $fooValue = $this->Popo->getFoo();
        $fooValueAgain = $this->Popo->getFoo();

        $property = $this->getProtectedProperty(get_class($this->Popo), 'property_name_cache');
        $cache = $property->getValue($this->Popo);

        $this->assertEquals($fooValue, $fooValueAgain);
        $this->assertNotEmpty($cache);
        $this->assertEquals($cache, [
            'getFoo' => 'foo'
        ]);
    }

    public function test_set_data_should_reset_property_cache(): void
    {
        $fooValue = $this->Popo->getFoo();
        $fooValueAgain = $this->Popo->getFoo();

        $this->assertEquals($fooValue, $fooValueAgain);

        $this->Popo->setData(['foo' => 1]);

        $property = $this->getProtectedProperty(get_class($this->Popo), 'property_name_cache');
        $cache = $property->getValue($this->Popo);

        $this->assertEquals($fooValue, $fooValueAgain);
        $this->assertEmpty($cache);
    }

    public function test_get_undefined_value_should_throw_exception(): void
    {
        $this->expectException(\Everon\Component\Utils\Popo\Exception\InvalidPropertyRequestedException::class);
        $this->expectExceptionMessage('Invalid property requested: "undefined" with "getUndefined()" in "Everon\Component\Utils\Tests\Unit\Doubles\PopoStub"');

        $this->assertEquals('foobar', $this->Popo->getUndefined());
    }

    public function test_set_undefined_value_should_throw_exception(): void
    {
        $this->expectException(\Everon\Component\Utils\Popo\Exception\InvalidPropertyRequestedException::class);
        $this->expectExceptionMessage('Invalid property requested: "undefined" with "setUndefined()" in "Everon\Component\Utils\Tests\Unit\Doubles\PopoStub"');

        $this->Popo->setUndefined(100);
    }

    public function test_call_to_non_setter_or_getter_method_should_throw_exception(): void
    {
        $this->expectException(\Everon\Component\Utils\Popo\Exception\InvalidMethodCallException::class);
        $this->expectExceptionMessage('Invalid method call: "someUndefinedMethod()" in "Everon\Component\Utils\Tests\Unit\Doubles\PopoStub"');

        $this->Popo->someUndefinedMethod();
    }

}

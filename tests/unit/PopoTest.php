<?php
declare(strict_types = 1);
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

    protected function setUp()
    {
        $this->Popo = new PopoStub($this->arrayFixture);
    }

    public function test_get_value()
    {
        $this->assertEquals(1, $this->Popo->getFoo());
        $this->assertEquals('barValue', $this->Popo->getBar());
        $this->assertEquals(null, $this->Popo->getFuzzBarFoo());
    }

    public function test_set_value()
    {
        $this->Popo->setFoo(100);
        $this->assertEquals(100, $this->Popo->getFoo());
    }

    /**
     * @expectedException \Everon\Component\Utils\Popo\Exception\InvalidPropertyRequestedException
     * @expectedExceptionMessage Invalid property requested: "undefined" with "getUndefined()" in "Everon\Component\Utils\Tests\Unit\Doubles\PopoStub"
     *
     * @return void
     */
    public function test_get_undefined_value_should_throw_exception()
    {
        $this->assertEquals('foobar', $this->Popo->getUndefined());
    }

    /**
     * @expectedException \Everon\Component\Utils\Popo\Exception\InvalidPropertyRequestedException
     * @expectedExceptionMessage Invalid property requested: "undefined" with "setUndefined()" in "Everon\Component\Utils\Tests\Unit\Doubles\PopoStub"
     *
     * @return void
     */
    public function test_set_undefined_value_should_throw_exception()
    {
        $this->Popo->setUndefined(100);
    }

    /**
     * @expectedException \Everon\Component\Utils\Popo\Exception\InvalidMethodCallException
     * @expectedExceptionMessage Invalid method call: "someUndefinedMethod()" in "Everon\Component\Utils\Tests\Unit\Doubles\PopoStub"
     *
     * @return void
     */
    public function test_call_to_non_setter_or_getter_method_should_throw_exception()
    {
        $this->Popo->someUndefinedMethod();
    }

}

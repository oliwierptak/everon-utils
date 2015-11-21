<?php
/**
 * This file is part of the Everon framework.
 *
 * (c) Oliwier Ptak <EveronFramework@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\Tests\Unit;

use Everon\Component\Utils\Tests\Unit\Doubles\PopoStub;

class PopoTest extends \PHPUnit_Framework_TestCase
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

    public function test_get_data_value()
    {
        $this->assertEquals(1, $this->Popo->getFoo());
        $this->assertEquals('barValue', $this->Popo->getBar());
        $this->assertEquals(null, $this->Popo->getFuzzBarFoo());
    }

    /**
     * @expectedException \Everon\Component\Utils\Popo\Exception\InvalidPropertyRequestedException
     * @expectedExceptionMessage Invalid property requested: "undefined" with "getUndefined()" in "Everon\Component\Utils\Tests\Unit\Doubles\PopoStub"
     *
     * @return void
     */
    public function test_get_undefined_data_value_should_throw_exception()
    {
        $this->assertEquals('foobar', $this->Popo->getUndefined());
    }

    public function test_set_data_value()
    {
        $this->Popo->setFoo(100);
        $this->assertEquals(100, $this->Popo->getFoo());
    }

    /**
     * @expectedException \Everon\Component\Utils\Popo\Exception\InvalidPropertyRequestedException
     * @expectedExceptionMessage Invalid property requested: "undefined" with "setUndefined()" in "Everon\Component\Utils\Tests\Unit\Doubles\PopoStub"
     *
     * @return void
     */
    public function test_set_undefined_data_value_should_throw_exception()
    {
        $this->Popo->setUndefined(100);
    }

    /**
     * @expectedException \Everon\Component\Utils\Popo\Exception\InvalidMethodCallException
     * @expectedExceptionMessage Invalid method call: "someUndefinedMethod()" in "Everon\Component\Utils\Tests\Unit\Doubles\PopoStub"
     *
     * @return void
     */
    public function test_set_undefined_method_should_throw_exception()
    {
        $this->Popo->someUndefinedMethod();
    }
}

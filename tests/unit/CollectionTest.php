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

use Everon\Component\Utils\TestCase\MockeryTest;
use Everon\Component\Utils\Tests\Unit\Doubles\CollectionStub;

class CollectionTest extends MockeryTest
{

    /**
     * @var CollectionStub
     */
    protected $CollectionStub;

    /**
     * @var array
     */
    protected $arrayFixture = [
        'foo' => 1,
        'bar' => 'barValue',
        'fuzz' => null,
    ];

    protected function setUp()
    {
        $this->CollectionStub = new CollectionStub($this->arrayFixture);
    }

    public function test_to_array_using_data_property()
    {
        $expected = [
            'foo' => 1,
            'bar' => 'barValue',
            'fuzz' => null,
        ];

        $this->assertEquals($expected, $this->CollectionStub->toArray(true));
    }

    public function test_to_array_using_getArrayableData_method()
    {
        $data = [
            'arrayable_data' => 'foobar',
        ];

        $this->CollectionStub->setArrayableData($data);

        $this->assertEquals($data, $this->CollectionStub->toArray(true));
    }

}

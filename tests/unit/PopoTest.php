<?php
/**
 * This file is part of the Everon framework.
 *
 * (c) Oliwier Ptak <EveronFramework@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\Popo\Tests\Unit;

use Everon\Component\Utils\Popo\Popo;
use Everon\Component\Utils\Popo\PopoInterface;

class PopoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $arrayFixture = [
        'foo' => 1,
        'bar' => 'barValue',
        'fuzz' => null,
    ];

    /**
     * @var PopoInterface
     */
    protected $Popo;

    protected function setUp()
    {
        $this->Popo = new Popo($this->arrayFixture);
    }

    public function test_get_data_value()
    {
        $this->assertEquals(1, $this->Popo->getFoo());
    }

}

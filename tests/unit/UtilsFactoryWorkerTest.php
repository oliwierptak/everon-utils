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

use Everon\Component\Factory\Dependency\Container;
use Everon\Component\Factory\Dependency\ContainerInterface;
use Everon\Component\Factory\FactoryInterface;
use Everon\Component\Utils\TestCase\MockeryTest;
use Everon\Component\Utils\Tests\Unit\Doubles\FactoryStub;
use Everon\Component\Utils\UtilsFactoryWorkerInterface;

class UtilsFactoryWorkerTest extends MockeryTest
{

    /**
     * @var UtilsFactoryWorkerInterface
     */
    protected $UtilsFactoryWorker;

    /**
     * @var FactoryInterface
     */
    protected $Factory;

    protected function setUp()
    {
        $Container = new Container();

        /* @var ContainerInterface $Container */
        $this->Factory = new FactoryStub($Container);
        $this->UtilsFactoryWorker = $this->Factory->getWorkerByName('Utils', 'Everon\Component\Utils');

        $FactoryWorker = $this->UtilsFactoryWorker;

        $Container->register('CriteriaBuilderFactoryWorker', function () use ($FactoryWorker) {
            return $FactoryWorker;
        });
    }

    public function test_is_a_worker()
    {
        $this->assertInstanceOf('Everon\Component\Utils\UtilsFactoryWorkerInterface', $this->UtilsFactoryWorker);
    }

}

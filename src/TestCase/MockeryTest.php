<?php
/**
 * This file is part of the Everon framework.
 *
 * (c) Oliwier Ptak <EveronFramework@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\TestCase;

use Mockery;

class MockeryTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        Mockery::close();
    }

}
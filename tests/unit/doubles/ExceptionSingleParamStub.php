<?php
/**
 * This file is part of the Everon framework.
 *
 * (c) Oliwier Ptak <EveronFramework@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\Tests\Unit\Doubles;

use Everon\Component\Utils\Exception\AbstractException;

class ExceptionSingleParamStub extends AbstractException
{
    protected $message = 'Lorem ipsum: "%s"';
}
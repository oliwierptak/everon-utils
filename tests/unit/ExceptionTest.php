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

use Everon\Component\Utils\Exception\AbstractException;
use Everon\Component\Utils\TestCase\MockeryTest;
use Everon\Component\Utils\Tests\Unit\Doubles\ExceptionMultipleParamsStub;
use Everon\Component\Utils\Tests\Unit\Doubles\ExceptionSingleParamStub;

class ExceptionTest extends MockeryTest
{
    public function test_exception_message(): void
    {
        $this->expectException(\Everon\Component\Utils\Tests\Unit\Doubles\ExceptionSingleParamStub::class);
        $this->expectExceptionMessage('Lorem ipsum: "%s"');

        throw new ExceptionSingleParamStub();
    }

    public function test_exception_message_with_param(): void
    {
        $this->expectException(\Everon\Component\Utils\Tests\Unit\Doubles\ExceptionSingleParamStub::class);
        $this->expectExceptionMessage('Lorem ipsum: "foobar"');

        throw new ExceptionSingleParamStub('foobar');
    }

    public function test_exception_message_with_multiple_params(): void
    {
        $this->expectException(\Everon\Component\Utils\Tests\Unit\Doubles\ExceptionMultipleParamsStub::class);
        $this->expectExceptionMessage('Multiple Lorem ipsum: "foobar" in "fuzz" for "123"');

        throw new ExceptionMultipleParamsStub(['foobar', 'fuzz', 123]);
    }

    public function test_exception_message_with_exception_should_overwrite_message(): void
    {
        $this->expectException(\Everon\Component\Utils\Tests\Unit\Doubles\ExceptionMultipleParamsStub::class);
        $this->expectExceptionMessage('Lorem ipsum: "foobar"');

        $AnotherException = new ExceptionSingleParamStub('foobar');
        throw new ExceptionMultipleParamsStub($AnotherException);
    }

    public function test_getErrorMessageFromException(): void
    {
        $AnotherException = new ExceptionSingleParamStub('foobar');
        $message = AbstractException::getErrorMessageFromException($AnotherException);

        $this->assertEquals('{Everon\Component\Utils\Tests\Unit\Doubles\ExceptionSingleParamStub} Lorem ipsum: "foobar"', $message);
    }

    public function test_get_to_string(): void
    {
        $AnotherException = new ExceptionSingleParamStub('foobar');
        $message = (string) $AnotherException;

        $this->assertEquals('{Everon\Component\Utils\Tests\Unit\Doubles\ExceptionSingleParamStub} Lorem ipsum: "foobar"', $message);
    }

}

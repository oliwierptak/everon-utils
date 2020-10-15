<?php declare(strict_types = 1);
/**
 * This file is part of the Everon components.
 *
 * (c) Oliwier Ptak <everonphp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Everon\Component\Utils\TestCase;

use Mockery;
use ReflectionMethod;
use ReflectionProperty;

class MockeryTest extends Mockery\Adapter\Phpunit\MockeryTestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    /**
     * @param string $class_name
     * @param string $name
     *
     * @return \ReflectionProperty
     * @throws \ReflectionException
     */
    public function getProtectedProperty(string $class_name, string $name): ReflectionProperty
    {
        $Reflection = new \ReflectionClass($class_name);
        $Property = $Reflection->getProperty($name);
        $Property->setAccessible(true);

        return $Property;
    }

    /**
     * @param string $class_name
     * @param string $name
     *
     * @return \ReflectionMethod
     * @throws \ReflectionException
     */
    public function getProtectedMethod(string $class_name, string $name): ReflectionMethod
    {
        $Reflection = new \ReflectionClass($class_name);
        $Method = $Reflection->getMethod($name);
        $Method->setAccessible(true);

        return $Method;
    }
}

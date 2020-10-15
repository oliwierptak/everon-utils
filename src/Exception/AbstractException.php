<?php declare(strict_types = 1);
/**
 * This file is part of the Everon components.
 *
 * (c) Oliwier Ptak <oliwierptak@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\Exception;

use Everon\Component\Utils\Text\ToString;
use Exception;

abstract class AbstractException extends Exception
{

    use ToString;

    /**
     * @param null $parameters
     * @param null $message
     * @param null $Previous
     * @param int $code
     */
    public function __construct($parameters = null, $message = null, $Previous = null, $code = 0)
    {
        if ($parameters instanceof Exception) {
            $message = $parameters->getMessage();
        } elseif ($message === null) {
            $message = $this->message;
        }

        $message = $this->formatExceptionParams($message, $parameters);

        parent::__construct($message, $code, $Previous);
    }

    /**
     * @param string $message
     * @param mixed $parameters
     *
     * @return string
     */
    protected function formatExceptionParams(string $message, $parameters): string
    {
        if (trim($message) === '' || $parameters === null) {
            return $message;
        }

        if (is_array($parameters) === false) {
            $parameters = [$parameters];
        }

        return @vsprintf($message, $parameters);
    }

    public static function getErrorMessageFromException(Exception $Exception): string
    {
        $message = '';
        $exception_message = $Exception->getMessage();
        $class = get_class($Exception);
        if ($class !== '') {
            $message = $message . '{' . $class . '}';
        }
        if ($message !== '' && $exception_message !== '') {
            $message = $message . ' ';
        }
        $message = $message . $exception_message;

        return $message;
    }

    protected function getToString(): string
    {
        return static::getErrorMessageFromException($this);
    }

}

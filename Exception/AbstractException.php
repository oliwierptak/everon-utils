<?php
/**
 * This file is part of the Everon framework.
 *
 * (c) Oliwier Ptak <oliwierptak@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\Exception;


abstract class AbstractException extends \Exception
{
    protected $toString = null;
    
    /**
     * @param null $params
     * @param string $message
     * @param null $Previous
     * @param null $Callback
     */
    public function __construct($params=null, $message, $Previous=null, $Callback=null)
    {
        if ($message instanceof \Exception) {
            $message = $message->getMessage();
        }
        
        $message = $this->formatExceptionParams($message, $params);

        if ($Callback instanceof \Closure) {
            $Callback();
        }
        
        parent::__construct($message, 0, $Previous);
    }

    /**
     * @param $message
     * @param $parameters
     * @return string
     */
    protected function formatExceptionParams($message, $parameters)
    {
        if (trim($message) === '' || is_null($parameters)) {
            return $message;
        }

        if (is_array($parameters) === false) {
            $parameters = array($parameters);
        }

        return @vsprintf($message, $parameters);
    }

    /**
     * @param \Exception $Exception
     * @return string
     */
    public static function getErrorMessageFromException(\Exception $Exception)
    {
        $message = "";
        $exception_message = $Exception->getMessage();
        $class = get_class($Exception);
        if ($class != '') {
            $message = $message.'{'.$class.'}';
        }
        if ($message != '' && $exception_message != '') {
            $message = $message.' ';
        }
        $message = $message.$exception_message;

        return $message;
    }

    /**
     * @return string
     */
    protected function getToString()
    {
        return static::getErrorMessageFromException($this);
    }

}

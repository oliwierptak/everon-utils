<?php
/**
 * This file is part of the Everon components.
 *
 * (c) Oliwier Ptak <oliwierptak@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\Text;

trait StartsWith
{

    /**
     * @param string $string
     * @param string $startsWith
     *
     * @return bool
     */
    protected function textStartsWith(string $string, string $startsWith): bool
    {
        return (bool) (mb_strpos($string, $startsWith) === 0);
    }

}

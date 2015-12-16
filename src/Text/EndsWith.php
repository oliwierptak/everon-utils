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

trait EndsWith
{

    /**
     * @param string $string
     * @param string $endsWith
     *
     * @return bool
     */
    protected function textEndsWith(string $string, string $endsWith): bool
    {
        $endsWith = trim($endsWith);
        if ($endsWith === '') {
            return false;
        }

        return (bool) (substr_compare($string, $endsWith, -strlen($endsWith), strlen($endsWith)) === 0);
    }

}

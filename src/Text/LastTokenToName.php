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

trait LastTokenToName
{

    /**
     * @param string $name
     * @param string $split
     *
     * @return string
     */
    protected function textLastTokenToName(string $name, string $split = '\\'): string
    {
        $tokens = explode($split, $name);

        return array_pop($tokens);
    }

}

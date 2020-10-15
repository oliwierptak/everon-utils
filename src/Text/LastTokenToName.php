<?php declare(strict_types = 1);
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
     * @return mixed
     */
    protected function textLastTokenToName(string $name, string $split = '\\')
    {
        $tokens = explode($split, $name);

        return array_pop($tokens);
    }

}

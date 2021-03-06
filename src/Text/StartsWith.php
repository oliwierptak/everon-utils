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

trait StartsWith
{

    protected function textStartsWith(string $string, string $starts_with): bool
    {
        return mb_strpos($string, $starts_with) === 0;
    }

}

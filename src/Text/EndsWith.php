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

trait EndsWith
{
    protected function textEndsWith(string $string, string $ends_with): bool
    {
        $ends_with = trim($ends_with);
        if ($ends_with === '') {
            return false;
        }

        return substr_compare($string, $ends_with, -strlen($ends_with), strlen($ends_with)) === 0;
    }

}

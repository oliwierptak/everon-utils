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

trait UnderscoreToCamel
{

    protected function textUnderscoreToCamel(string $string): string
    {
        $camelized_string = '';
        $string_tokens = explode('_', strtolower($string));
        for ($a = 0; $a < count($string_tokens); ++$a) {
            $camelized_string .= ucfirst($string_tokens[$a]);
        }

        return $camelized_string;
    }

}

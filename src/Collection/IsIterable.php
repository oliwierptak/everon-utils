<?php
/**
 * This file is part of the Everon framework.
 *
 * (c) Oliwier Ptak <EveronFramework@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\Collection;

trait IsIterable
{
    /**
     * @param $input
     *
     * @return bool
     */
    protected function collectionIsIterable($input)
    {
        if (isset($input) && is_array($input)) {
            return true;
        }

        if ($input instanceof \ArrayAccess || $input instanceof \Iterator || $input instanceof \Traversable) {
            return true;
        }

        return false;
    }
}

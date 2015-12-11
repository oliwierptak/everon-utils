<?php
/**
 * This file is part of the Everon components.
 *
 * (c) Oliwier Ptak <oliwierptak@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\Collection;

trait ToArray
{

    use IsIterable;

    /**
     * @param bool $deep
     *
     * @return array
     */
    public function toArray($deep = false)
    {
        if (method_exists($this, 'getArrayableData')) {
            $data = $this->getArrayableData($deep);
        } else {
            $data = (property_exists($this, 'data')) ? $this->data : null;
        }

        if ($this->collectionIsIterable($data) === false) {
            return [];
        }

        if ($deep) {
            foreach ($data as $key => $value) {
                if ($value instanceof ArrayableInterface) {
                    /* @var ArrayableInterface $value */
                    $data[$key] = $value->toArray($deep);
                }
            }
        }

        return $data;
    }

}

<?php
/**
 * This file is part of the Everon framework.
 *
 * (c) Oliwier Ptak <EveronFramework@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\Tests\Unit\Doubles;


use Everon\Component\Utils\Collection\ArrayableInterface;
use Everon\Component\Utils\Collection\ToArray;

class CollectionStub implements ArrayableInterface
{
    use ToArray;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var array
     */
    protected $arrayable_data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->arrayable_data = $data;
    }

    /**
     * @return array
     */
    protected function getArrayableData()
    {
        return $this->arrayable_data;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    public function setArrayableData(array $data)
    {
        $this->arrayable_data = $data;
    }
}

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

    public function __construct(array $data)
    {
        $this->data = $data;
    }
}

<?php declare(strict_types = 1);
/**
 * This file is part of the Everon components.
 *
 * (c) Oliwier Ptak <everonphp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils\Popo;

use Everon\Component\Utils\Collection\ArrayableInterface;

interface PopoInterface extends ArrayableInterface
{
    public function getData(): array;

    public function setData(array $data): void;
}

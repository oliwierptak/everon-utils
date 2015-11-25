<?php
/**
 * This file is part of the Everon framework.
 *
 * (c) Oliwier Ptak <EveronFramework@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Everon\Component\Utils;

use Everon\Component\Factory\FactoryWorkerInterface as WorkerInterface;
use Everon\Component\Utils\Popo\PopoInterface;

interface FactoryWorkerInterface extends WorkerInterface
{
    /**
     * @param array $data
     *
     * @return PopoInterface
     */
    public function buildPopo(array $data);

    /**
     * @param string $time
     * @param \DateTimeZone|null $timezone
     *
     * @return \DateTime
     */
    public function buildDateTime($time = 'now', \DateTimeZone $timezone = null);

    /**
     * @param $timezone
     *
     * @return \DateTimeZone
     */
    public function buildDateTimeZone($timezone);

    /**
     * @param $locale
     * @param $datetype
     * @param $timetype
     * @param $timezone
     * @param $calendar
     * @param $pattern
     *
     * @return \IntlDateFormatter
     */
    public function buildIntlDateFormatter($locale, $datetype, $timetype, $timezone, $calendar, $pattern);
}

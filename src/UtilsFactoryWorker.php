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

use Everon\Component\Factory\AbstractWorker;
use Everon\Component\Utils\Popo\Popo;

class UtilsFactoryWorker extends AbstractWorker implements UtilsFactoryWorkerInterface
{
    /**
     * @inheritdoc
     */
    protected function registerBeforeWork()
    {
        $Factory = $this->getFactory();
        $this->getFactory()->getDependencyContainer()->register('UtilsFactoryWorker', function() use ($Factory) {
            return $Factory->getWorkerByName('UtilsFactoryWorker', 'Everon\Component\Utils');
        });
    }

    /**
     * @inheritdoc
     */
    public function buildPopo(array $data)
    {
        return new Popo($data);
    }

    /**
     * @inheritdoc
     */
    public function buildDateTime($time = 'now', \DateTimeZone $timezone = null)
    {
        return new \DateTime($time, $timezone);
    }

    /**
     * @inheritdoc
     */
    public function buildDateTimeZone($timezone)
    {
        return new \DateTimeZone($timezone);
    }

    /**
     * @inheritdoc
     */
    public function buildIntlDateFormatter($locale, $datetype, $timetype, $timezone, $calendar, $pattern)
    {
        return new \IntlDateFormatter($locale, $datetype, $timetype, $timezone, $calendar, $pattern);
    }
}

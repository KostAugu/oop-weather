<?php

namespace Weather\Api;

use Weather\Model\NullWeather;
use Weather\Model\Weather;

class GoogleApi
{
    /**
     * @return Weather
     * @throws \Exception
     */
    public function getToday()
    {
        $today = $this->load(new NullWeather());
        $today->setDate(new \DateTime());

        return $today;
    }

    /**
     * @return Weather
     * @throws \Exception
     */
    public function getWeek()
    {
        $week = [];
        $counter = 0;

        while ($counter < 7) {
            $day = $this->load(new NullWeather());
            $day->setDate(new \DateTime("+" . $counter . "day"));
            $week[] = $day;
            $counter++;
        }

        return $week;
    }

    /**
     * @param Weather $before
     * @return Weather
     * @throws \Exception
     */
    private function load(Weather $before)
    {
        $now = new Weather();
        $base = $before->getDayTemp();
        $now->setDayTemp(random_int(5 - $base, 5 + $base));

        $base = $before->getNightTemp();
        $now->setNightTemp(random_int(-5 - abs($base), -5 + abs($base)));

        $now->setSky(random_int(1, 3));

        return $now;
    }
}

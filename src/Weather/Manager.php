<?php

namespace Weather;

use Weather\Api\DataProvider;
use Weather\Api\DbRepository;
use Weather\Api\GoogleApi;
use Weather\Api\WeatherApi;
use Weather\Model\Weather;

class Manager
{
    /**
     * @var DataProvider
     */
    private $transporter;

    public function getTodayInfo(string $dataSource): Weather
    {
        if ($dataSource === "DataApi")
            return $this->getTransporter($dataSource)->selectByDate(new \DateTime());

        if ($dataSource === "WeatherApi")
            return $this->getTransporter($dataSource)->selectByDate(new \DateTime());

        if ($dataSource === "GoogleApi")
            return $this->getTransporter($dataSource)->getToday();
    }

    public function getWeekInfo(string $dataSource): array
    {
        if ($dataSource === "DataApi")
            return $this->getTransporter($dataSource)->selectByRange(new \DateTime('midnight'), new \DateTime('+6 days midnight'));

        if ($dataSource === "WeatherApi")
            return $this->getTransporter($dataSource)->selectByRange(new \DateTime('midnight'), new \DateTime('+6 days midnight'));

        if ($dataSource === "GoogleApi")
            return $this->getTransporter($dataSource)->getWeek();
    }

    private function getTransporter(string $dataSource)
    {
        if (null === $this->transporter) {
            switch ($dataSource) {
                case "DataApi":
                    $this->transporter = new DbRepository();
                    break;
                case "WeatherApi":
                    $this->transporter = new WeatherApi();
                    break;
                case "GoogleApi":
                    $this->transporter = new GoogleApi();
                    break;
            }
        }
        return $this->transporter;
    }
}



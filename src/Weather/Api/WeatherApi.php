<?php

namespace Weather\Api;

use Weather\Model\Weather;

class WeatherApi extends DbRepository
{
    /**
     * @return Weather[]
     * @throws \Exception
     */
    protected function selectAll(): array
    {
        $result = [];
        $data = json_decode(
            file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'Db' . DIRECTORY_SEPARATOR . 'Weather.json'),
            true
        );
        foreach ($data as $item) {
            $record = new Weather();
            $record->setDate(new \DateTime($item['date']));
            $record->setDayTemp($item['high']);
            $record->setNightTemp($item['low']);
            $record->setWeather($item['text']);
            $result[] = $record;
        }

        return $result;
    }
}

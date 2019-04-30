<?php

namespace Weather\Model;

class Weather
{
    private $map = [
        1 => 'cloud',
        2 => 'cloud-rain',
        3 => 'sun',
        'Cloudy' => 'cloud',
        'Scattered Showers' => 'cloud-rain',
        'Breezy' => 'wind',
        'Partly Cloudy' => 'cloud-sun',
        'Mostly Cloudy' => 'cloud',
        'Sunny' => 'sun',
    ];


    /**
     * @var integer
     */
    protected $dayTemp;

    /**
     * @var integer
     */
    protected $nightTemp;

    /**
     * @var int
     */
    protected $sky;

    /**
     * @var string
     */
    protected $weather;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @return int
     */
    public function getDayTemp(): int
    {
        return $this->dayTemp;
    }

    /**
     * @param int $dayTemp
     */
    public function setDayTemp(int $dayTemp): void
    {
        $this->dayTemp = $dayTemp;
    }

    /**
     * @return int
     */
    public function getNightTemp(): int
    {
        return $this->nightTemp;
    }

    /**
     * @param int $nightTemp
     */
    public function setNightTemp(int $nightTemp): void
    {
        $this->nightTemp = $nightTemp;
    }

    /**
     * @return int
     */
    public function getSky(): int
    {
        return $this->sky;
    }

    /**
     * @param int $sky
     */
    public function setSky(int $sky): void
    {
        $this->sky = $sky;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    public function getSkySymbol()
    {
        if (isset($this->sky))
            return $this->map[$this->sky];
        if (isset($this->weather))
            return $this->map[$this->weather];
    }

    /**
     * @return string
     */
    public function getWeather(): string
    {
        return $this->weather;
    }

    /**
     * @param string $weather
     */
    public function setWeather(string $weather): void
    {
        $this->weather = $weather;
    }
}

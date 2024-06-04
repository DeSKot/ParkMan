<?php

namespace App\DTO\Garage;

class Filter
{
    private null|string $country = null;
    private null|string $ownerName = null;
    private null|string $longitude = null;
    private null|string $latitude = null;

    public function setCountry(null|string $country): void
    {
        $this->country = $country;
    }

    public function getCountry(): null|string
    {
        return $this->country;
    }

    public function setOwnerName(null|string $ownerName): void
    {
        $this->ownerName = $ownerName;
    }

    public function getOwnerName(): null|string
    {
        return $this->ownerName;
    }

    public function setLongitude(null|string $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function getLongitude(): null|string
    {
        return $this->longitude;
    }

    public function setLatitude(null|string $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLatitude(): null|string
    {
        return $this->latitude;
    }
}

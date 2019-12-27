<?php

namespace Brillianttechnologies\GivelyModels;

use Exception;

/**
 * Description of Location
 *
 * @author Lukasz
 */
class Location
{
    const LOCATION_PATTERN = '^\(?\-?\d{1,2}\.\d{6,20},\s?\-?\d{1,2}\.\d{6,20}\)?$';
    public $lat;
    public $lon;

    public function __construct(string $lat, string $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public static function setFromString(string $latLon)
    {
        $matches = [];
        $pattern = self::LOCATION_PATTERN;
        if (preg_match("/$pattern/", $latLon, $matches)) {
            $locExp = explode(',', trim($matches[0], '() '));
            return new self((double)$locExp[0], (double)$locExp[1]);
        }
        throw new Exception("Location string didn't match the pattern");
        return null;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function getLon()
    {
        return $this->lon;
    }

    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    public function setLon($lon)
    {
        $this->lon = $lon;
    }
}

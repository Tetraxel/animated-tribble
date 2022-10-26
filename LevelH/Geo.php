<?php

namespace Hackathon\LevelH;
ini_set('memory_limit', '-1');
class Geo
{
    public function __construct()

    {

    }

    public function getClosestCityFromId($id){
        $myCities = new CitiesData();
        $cities = $myCities->getCities();
        $srcCity = $myCities->getCityInfoById($id);
        $closestDistance = PHP_INT_MAX;
        $closestCity = $srcCity;
        $pythagore = PHP_INT_MAX;
        $cosDeg2RadLat1 = cos(deg2rad($srcCity['lat']));

        foreach ($cities as $dstCity) {
            if ($dstCity['id'] === $srcCity['id']){
                continue;
            }

            $interlat = $srcCity['lat'] - $dstCity['lat'];
            $interlog = $srcCity['long'] - $dstCity['long'];
            $inter = sqrt($interlat*$interlat + $interlog*$interlog);


            if ($pythagore < $inter)
                continue;
            
            $pythagore = $inter;

            $distance = $this->computeDistance(
                $srcCity['lat'],
                $srcCity['long'],
                $dstCity['lat'],
                $dstCity['long'],
                $cosDeg2RadLat1
            );

            if ($closestDistance > $distance) {
                $closestDistance = $distance;
                $closestCity = $dstCity;
            }
        }

        return $closestCity;

    }

    /**
     * Give the distance in meter between two points (in kilometer)
     *
     * @param $lat1
     * @param $lng1
     * @param $lat2
     * @param $lng2
     * @return int
     */

    private function computeDistance($lat1, $lng1, $lat2, $lng2, $cosDeg2RadLat1){
        $R = 6378.137;
        $PI_360 = pi() / 360;

        $cLat = cos(($lat1 + $lat2) * $PI_360);
        $dLat = ($lat2 - $lat1) * $PI_360;
        $dLon = ($lng2 - $lng1) * $PI_360;
        $f = $dLat * $dLat + $cLat * $cLat * $dLon * $dLon;
        $c = 2 * atan2(sqrt($f), sqrt(1 - $f));   
        return $R * $c;
    }
};
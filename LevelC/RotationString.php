<?php

namespace Hackathon\LevelC;

class RotationString
{
    /**
     * @TODO ! BAM
     *
     * @param $s1
     * @param $s2
     *
     * @return bool|int
     */
    public static function isRotation($s1, $s2)
    {
        /** @TODO */
        $len = strlen($s1);
        if ($len != strlen($s2))
            return false;

        $a1 = str_split($s1);
        $a2 = str_split($s2);

        for ($i = 0; $i < $len; $i++) {
            if ($a1 == $a2)
                return true;

            $tmp = $a1[0];
            array_shift($a1);
            array_push($a1, $tmp);
        }

        return false;
    }

    public static function isSubString($s1, $s2)
    {
        $pos = strpos($s1, $s2);

        return $pos;
    }
}

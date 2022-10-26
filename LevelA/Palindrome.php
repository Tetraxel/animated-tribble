<?php

namespace Hackathon\LevelA;

class Palindrome
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    /**
     * This function creates a palindrome with his $str attributes
     * If $str is abc then this function return abccba
     *
     * @TODO
     * @return string
     */
    public function generatePalindrome()
    {
        /** @TODO */
        $ref = $this->str;
        preg_match_all('/./us', $this->str, $ar);
        $str = join('', array_reverse($ar[0]));
        $rev =  $ref . $str;
        return $rev;
    }

}

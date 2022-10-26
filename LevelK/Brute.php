<?php

namespace Hackathon\LevelK;

class Brute
{
    private $hash;
    public $origin;
    private $method; // md5 - crc32 - base64 - sha1

    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @TODO :
     *
     * Cette méthode essaye de trouver par la force à quel mot de 4 lettres correspond ce hash.
     * Sachant que nous ne connaissons pas le hash (enfin si... il suffit de regarder les commentaires de l'attribut privé $methode.
     */
    public function force()
    {
        for ($i = 0; $i < 26; $i++) {
            for ($j = 0; $j < 26; $j++) {
                for ($x = 0; $x < 26; $x++) {
                    for ($y = 0; $y < 26; $y++) {
                        $word = chr($i + 97) . chr($j + 97) . chr($x + 97) . chr($y + 97);
                        if (md5($word) == $this->hash) {
                            $this->origin = $word;
                            $this->method = 'md5';
                            return;
                        }
                        if (crc32($word) == $this->hash) {
                            $this->origin = $word;
                            $this->method = 'crc32';
                            return;
                        }
                        if (base64_encode($word) == $this->hash) {
                            $this->origin = $word;
                            $this->method = 'base64';
                            return;
                        }
                        if (sha1($word) == $this->hash) {
                            $this->origin = $word;
                            $this->method = 'sha1';
                            return;
                        }
                    }
                }
            }
        }

        // @TODO
    }
}

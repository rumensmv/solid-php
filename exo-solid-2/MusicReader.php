<?php

// Si on doit supporter un nouveau type de format, on doit modifier cette classe :(
require_once 'Mp3.php';
require_once 'Ogg.php';

class MusicReader
{
    private Music $music;

    public function __construct($filename)
    {
         $extension = pathinfo($filename, PATHINFO_EXTENSION);

        switch ($extension) {
            case 'mp3':
                $this->music = new Mp3($filename);
                break;
            case 'ogg':
                $this->music = new Ogg($filename);
                break;
            default:
                throw new \Exception('Aucun lecteur trouvé pour cette musique');
        }
        
    }

    public function listen():string
    {
        return $this->music->listen();
    }
}
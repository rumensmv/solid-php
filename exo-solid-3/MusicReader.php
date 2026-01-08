<?php
require_once 'Mp3.php';
require_once 'Ogg.php';

// Si on ajoute un nouveau format, cette classe ne change plus :-)
class MusicReader
{
    private $musicType;

    public function __construct(MusicType $musicType)
    {
        $this->musicType = $musicType;

        $extension = pathinfo($this->musicType->getFilename(), PATHINFO_EXTENSION);
        
        if (empty($extension)) {
            throw new UnknownExtensionException("Fichier sans extension : " . $this->musicType->getFilename());
        }
    }

    public function listen()
    {
        return $this->musicType->listen();
    }
}
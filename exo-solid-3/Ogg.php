<?php

require_once 'MusicType.php';

class Ogg extends MusicType
{
    public function listen()
    {
        $extension = pathinfo($this->filename, PATHINFO_EXTENSION);
       if (empty($extension)) {
            throw new UnknownExtensionException("Fichier sans extension : {$this->filename}");
        }
        if ($extension !== 'ogg') {
            throw new InvalidExtensionException("Fichier Ogg attendu mais '$extension' obtenu");
        }

        return 'Lecture du fichier Ogg '. $this->filename;
    }
}

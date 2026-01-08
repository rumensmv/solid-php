<?php
require_once 'Music.php';

class Mp3 extends Music
{
    public function listen(): string
    {
        return 'Lecture du fichier Mp3 '. $this->filename;
    }
}

<?php
require_once 'Music.php';

class Ogg extends Music
{
    public function listen():string
    {
        return 'Lecture du fichier Ogg '. $this->filename;
    }
}
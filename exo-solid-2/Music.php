<?php

abstract class Music 
{
     protected $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    abstract public function listen(): string;
}
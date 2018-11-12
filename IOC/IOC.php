<?php

class Part{
}

class Engine{
    protected $part ;
    function __construct(Parts $part)
    {
        $this->part = $part ;
    }
}

class Car{

}
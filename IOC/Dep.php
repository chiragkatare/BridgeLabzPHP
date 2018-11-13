<?php 

/**
 * depeandencies for the php ioc class 
 */
return [
    'car' => function () {
        return new Car(new Engine(new Part()));
    },
    'engine' => function () {
        return new Engine(new Part());
    },
    'part' => function () {
        return new part;
    }
];
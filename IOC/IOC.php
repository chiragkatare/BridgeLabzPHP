<?php

/**
 * top level exception handler function to handle exception
 */
set_exception_handler(function ($e){
    echo "\nException Occurred\n";
    echo $e->getMessage();
});


/**
 * class part aact as a part of class
 */
class Part
{
}

class Engine
{
    protected $part;
    function __construct(Part $part)
    {
        $this->part = $part;
    }
}

class Car
{
    protected $engine;
    function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    function run()
    {
        echo "vrooom vroom";
    }
}

class Container
{

    public static $deps = [];

    public static function init()
    {
        $debs = include("Dep.php");
        foreach ($debs as $key => $closure) {
            static::$deps[strtolower($key)] = $closure;
        }
    }

    static function getInstance(string $classname)
    {
        if (array_key_exists(strtolower($classname), static::$deps)) {
            return call_user_func(static::$deps[strtolower($classname)]);
        } else {
            throw new Exception("Class Not Found\nadd dependency first \n");
        }
    }

    static function addDependency(string $classname, closure $closure)
    {

        self::$deps[strtolower($classname)] = $closure;
    }

}
Container::init();
$deb = include("Dep.php");
$car = Container::getInstance("car");
$car->run();
//print_r($car);

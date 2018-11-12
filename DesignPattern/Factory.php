<?php
/**
 * Program Shows The Implementation of FActory desingn pattern in php
 */

/**
 * top level exception handler function to handle exception
 */
set_exception_handler(function ($e){
    echo "\nException Occurred\n";
    echo $e->getMessage();
});


 /**
  * Inteface car to provide basic car features
  */
interface Car
{
    function run();
    function getColour();
}

/**
 * class racecar implementing the car 
 */
class RaceCar implements Car
{
    private $color;

    function __construct(string $color)
    {
        $this->color = $color;
    }

    function run()
    {
        echo "RaceCar run";
    }

    function getColour()
    {
        return $this->color;
    }
}

/**
 * class passenger implementing the car interface 
 */
class PassengerCar implements Car
{
    /**
     * var colour to store the colour of the car
     */
    private $color;

    /**
     * constructor function with dependency injection
     */
    function __construct(string $color)
    {
        $this->color = $color;
    }

    function run()
    {
        echo "Passenger Car race";
    }

    function getColour()
    {
        return $this->color;
    }
}

/**
 * factory for car whih return car according to the need
 */
class CarFactory
{
    /**
     * static function get car to give the car according to type and color
     */
   static function getCar(string $type , string $color ){
       /**
        * if else to check the type of the car and call the desired class constructor
        */
        if($type = "race"  || $type == "racecar"){
            return new RaceCar($color);
        }
        else if($type = "passenger" || $type == "passengercar"){
            return new PassengerCar($color);
        }
        else {
            return null ;
        }
    }
}
//var racecar is the race car object
$racecar = CarFactory::getCar('race', 'red');
//var_dump($racecar);
$passengercar = CarFactory::getCar("passenger","blue");
echo "Reflection To Check Properties\n";
$ref = new ReflectionObject($racecar);
print_r($ref->getProperties());
?>
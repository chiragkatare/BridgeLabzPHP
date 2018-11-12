<?php 

/**
 * top level exception handler function to handle exception
 */
set_exception_handler(function ($e){
    echo "\nException Occurred\n";
    echo $e->getMessage();
});

/**
 * singleton class implementing single ton design patterns
 */
class Singleton
{
    //static instance of the class declared as protected
    protected static $instance;

    //private constructor to force not creating object
    private function __construct()
    {
    }

    //function to get instance of the class by lazy initilization
    public function gInstance()
    {
        /**isset to check if the instance is already initialized ot not null 
         * if its null then its going to initialize it or else its going to  
         */
        if (!isset(self::$instance)) {
            //echo "helo\n\n\n\n\n";
            //class variable to get the class name 
            $c = __class__;
            self::$instance = new $c;
              //  var_dump(self::$instance);
        }
        return self::$instance;
    }

    //function to test initialization 
    function hello()
    {
        //prints echo to the screen
        echo "\nhello";
    }
}

/**
 * function uses singleton to destroy the singleton pattern by not utilizing the singleton pattern
 */
function createInstanceWithoutConstructor(String $class)
{
    //gets class as a reflection class
    $reflector = new ReflectionClass($class);
    //getting the properties of the class as an array
    $properties = $reflector->getProperties();
    //getting the default properties of the class
    $defaults = $reflector->getDefaultProperties();

    /**
     * serializing object
     * and then un serializing the object thus getting the object without invoking the constructor
     */
    $serealized = "O:" . strlen($class) . ":\"$class\":" . count($properties) . ':{';
        //looping throught the properties
    foreach ($properties as $property) {
        //getting the name of the property
        $name = $property->getName();
        //checking the property if its protected or not
        /**
         *  * for protected null for private
         */
        if ($property->isProtected()) {
            $name = chr(0) . '*' . chr(0) . $name;
        } elseif ($property->isPrivate()) {
            $name = chr(0) . $class . chr(0) . $name;
        }
        $serealized .= serialize($name);
        if (array_key_exists($property->getName(), $defaults)) {
            $serealized .= serialize($defaults[$property->getName()]);
        } else {
            $serealized .= serialize(null);
        }
    }
    $serealized .= "}";
    //echo $serealized;
    //returning the unserialized object from serialized string
    return unserialize($serealized);
}


//echo serialize($newInst);
$oldinst = Singleton::gInstance();
//to check the object from the reflection method
echo "getting instance of singleton via method and checking it whith print_r \n";
print_r($oldinst);
echo "calling method of sigleton class hello using singleton instance\n";
$oldinst->hello();
echo "\ndestroying singleton with reflection\n";
$newInst = createInstanceWithoutConstructor("Singleton");
echo "calling method of sigleton class hello using reflection created instance\n";
$newInst->hello();
echo "\n";
print_r($newInst);
?>
<?php 
class Singleton
{
    protected static $instance;

    private function __construct()
    {
    }

    public function gInstance()
    {
        if (!isset(self::$instance)) {
            echo "helo\n\n\n\n\n";
            $c = __class__;
            self::$instance = new $c;
              //  var_dump(self::$instance);
        }
        return self::$instance;
    }

    function helo()
    {
        echo "\nhello";
    }
}

function createInstanceWithoutConstructor($class)
{
    $reflector = new ReflectionClass($class);
    $properties = $reflector->getProperties();
    $defaults = $reflector->getDefaultProperties();

    $serealized = "O:" . strlen($class) . ":\"$class\":" . count($properties) . ':{';
    foreach ($properties as $property) {
        $name = $property->getName();
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
    echo $serealized;
    return unserialize($serealized);
}

$newInst = createInstanceWithoutConstructor("Singleton");
echo serialize($newInst);
$oldinst =  Singleton::gInstance();
echo spl_object_hash($oldinst) . "\n";
echo spl_object_hash($newInst) . "\n";

?>
<?php
require("Utility.php");
class Power2{

    function Power(){
        $pow = Utility::getInt();
        if($pow<31){
            Utility::powerOf2($pow);
        }
        else{
            echo "power should be less than 32";
        }
}
}

Power2::Power();
?>
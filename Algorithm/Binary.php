<?php
require("Utility.php");
class Binary{

    function swap($bin){
        if(strlen($bin)%4 !== 0){
            for ($i=0; $i < (strlen($bin)%4)-4; $i++) { 
                $bin = "0".$bin;
            }
        }
        $arrBin = str_split($bin , 1);
        $size = count($arrBin);
        $l = $size-4;
        for ($j=0; $j < 4 ; $j++) { 
                $temp = $arrBin[$l] ;
                $arrBin[$l] = $arrBin[$j];
                $arrBin[$j] = $temp ;
                $l++;
        }
        $bin = implode($arrBin);
        echo $bin;
        return $bin ;
    }   

    static function powOf2($dec){
        $decArr = str_split($dec);
       $i = 0 ;
       $temp = 2**i;
       while ($temp < $dec) {
           if($temp == $dec){
               return true ;
           }
           $i++;
           $temp = 2**$i;
       }
       return false;
    }

    static function main(){

        echo "enter a no ";
        $num = Utility::getInt();
        $bin = Utility::toBin($num);
        echo "binary is ".$bin;
        $bin = Binary::swap($bin);
        echo "Binary after swapping is ".$bin."\n" ;
        $dec = Utility::binToDec($bin) ;
        echo "after decimal conversion ".$dec."\n";
        if(self::powOf2($dec)){
            echo "is power of 2\n";
        }
        else{
            echo "not power of 2";
        }
    }
}

Binary::main();
?>
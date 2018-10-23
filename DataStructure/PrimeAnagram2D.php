<?php
require("Utility.php");
function getprime($range){
    $prime = [] ;
    $count= 0;
    for ($i=2; $i < $range ; $i++) { 
        if(Utility::isprime($i)){
            $prime[$count++] = $i;
        }
    }
    return $prime;
}
function getIndex($numb){
    $num = $numb;
    if($num<100){
        return 0;
    }
    while($num>9){
        $num = floor($num/10);
    }
    return $num ;
}
function primeRun(){
    $primeArr = getPrime(1000);
    $anagram = [] ;
    $count= 0;
    for ($i=0; $i < count($primeArr); $i++) {
        for ($j=0; $j < count($primeArr) ; $j++) { 
            if(Utility::isAnagram($primeArr[$i], $primeArr[$j]))
            {
                $anagram[$count++] = $primeArr[$j] ;
            }
        }
    }
    $array2d = [] ;
    array_push($array2d , $anagram);
    array_push($array2d ,array_diff($primeArr , $anagram));
    echo "2D array stored is : ";
    Utility::print2d($array2d);
    echo "\n" ;
}

primeRun();
?>

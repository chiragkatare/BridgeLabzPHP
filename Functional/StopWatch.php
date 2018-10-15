<?php
class StopWatch{
    function watch(){
        echo"StopWatch\n";
        echo "enter to start ";
        $i = fgets(STDIN);
        $start = round(microtime(true)*1000);
        echo"enter 2 to stop ";
        $i = fgets(STDIN);
        $stop = round(microtime(true)*1000);
        echo "Time elapsed is ".($stop-$start)/1000;
    }
}

StopWatch::watch();

?>
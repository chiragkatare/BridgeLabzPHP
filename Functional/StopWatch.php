<?php
/**
 * Stopwatch Program for measuring the time that elapses between the start and end clicks
 * @author chiragkatare
 * @version 2.0   
 * @since 03-10-2018
 */
class StopWatch{
    /**
     * Function to Store end clicktime and start click time and print elapsed time
     */
    static function watch(){
        echo"StopWatch\n";
        echo "enter to start ";
        $i = fgets(STDIN);
        //get start time
        $start = round(microtime(true)*1000);
        echo"enter 2 to stop ";
        $i = fgets(STDIN);
        //get stop time
        $stop = round(microtime(true)*1000);
        //prints elapsed time
        echo "Time elapsed : ".(($stop-$start)/1000)." seconds\n";
    }
}

StopWatch::watch();

?>
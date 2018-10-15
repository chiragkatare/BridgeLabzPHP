
 <?php
require("Utility.php");
 /***********************************************************************************
 * Purpose: Program to simulate tic tac toe game between two player
 *
 * @author chiragkatare
 * @version 1.0
 * @since 05-10-2018
 *
 ******************************************************************************/
 class TicTacToe{
     //static variables to run the game 
     // static variable to store value in 2d array;
     public static $board = array(array(), array());

     //static variable to store player value
     public static $player = 0 ;

     //static boolean to store if there is a place in the board
     public static $isempty = true ; 

     //function to initialize array with defualt value -10 
     function initBoard(){
         echo"TicTacTOe Game\n\n";
        for($i = 0 ;$i<3;$i++){
            for($j = 0 ;$j <3 ;$j++){
                self::$board[$i][$j] = -10 ; 
            }
     }  
    }

    function dispBoard(){
        $count = 0 ;
        for($i = 0 ;$i<3;$i++){
            echo"---------------\n";
            echo"||";
            for($j = 0 ;$j <3 ;$j++){
                if(self::$board[$i][$j]==0){
                    $count++;
                    echo " O |";
                }
                else if(self::$board[$i][$j]==1){
                    $count++;
                    echo " X |";
                }
                else{
                    echo "   |";
                }
            }
            echo"|\n";
            if($count==9){
                self::$isempty == false ;
            }
            echo"---------------\n";
     }  
    }

    function win(){
        return ((self::$board[0][0] + self::$board[0][1] + self::$board[0][2] == self::$player * 3)
				|| (self::$board[1][0] + self::$board[1][1] + self::$board[1][2] == self::$player * 3)
				|| (self::$board[2][0] + self::$board[2][1] + self::$board[2][2] == self::$player * 3)
				|| (self::$board[0][0] + self::$board[1][0] + self::$board[2][0] == self::$player * 3)
				|| (self::$board[0][1] + self::$board[1][1] + self::$board[2][1] == self::$player * 3)
				|| (self::$board[0][2] + self::$board[1][2] + self::$board[2][2] == self::$player * 3)
				|| (self::$board[0][0] + self::$board[1][1] + self::$board[2][2] == self::$player * 3)
				|| (self::$board[2][0] + self::$board[1][1] + self::$board[0][2] == self::$player * 3));
    }

    function putVal(){
        $i;
        $j;
        if(self::$player==1){
           $i = rand(0,2);
           $j = rand(0,2); 
        }
        else{
            $i = Utility::getInt();
            $j = Utility::getInt();
            while($i>2||$j>2){
                echo"Enter correct values";
            $i = Utility::getInt();
            $j = Utility::getInt();
            }
        }
        if(self::$board[$i][$j]==-10){
            if(self::$player==1){
                self::$board[$i][$j]=0;
            }
            else{
                self::$board[$i][$j]=1;
                echo"computer choosing".$i." ".$j."\n";
            }
        }
        else{
            TicTacToe::putVal();
        }
    }



    function play(){
        self::initBoard();
        self::dispBoard();
        while(self::$isempty){
            echo" players turn ";
            self::putVal();
            self::dispBoard();
            if(self::win()){
                echo"Player won";
                return;
            }
            self::$player = 1;
            echo"computers turn\n";
            self::putVal();
            self::dispBoard();
            if(self::win()){
                echo"computer won\n";
                return;
            }
            self::$player = 0;

        }
    }
 }

 TicTacToe::play();

 ?>
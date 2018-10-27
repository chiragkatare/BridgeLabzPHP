<?php


// set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
//     echo "!!!!Error Occured!!!!!!!\n";
//     echo "Error: [$errno] $errstr - $error_file:$error_line \n";
//     echo "Terminating!!!!!!!!!\n";

//     die();
// });
require("Utility.php");


function validInt($int, $min, $max)
{
    while (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        echo ("Variable value is not within the legal range\n");
        echo "enter again : ";
        $int = Utility::getInt();
    }
    return $int;
}

//class to create object of stock
class Stock
{
    //var to store the data of stock
    public $name;
    //price of stack
    public $price;
    //quantity of share in the stock
    public $quantity;

    //constructor to initialize the variables in the class
    function __construct($name, $price, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

class StockAccount
{
    private $stock = [];
}

function buy($account)
{
    var_dump($account);
    $list = printStockList();
    echo "Enter No with Stock To Buy : ";
    $ch = validInt(Utility::getInt(), 1, 8);
    echo $list[$ch - 1]->name . " selected!\nEnter No Of Shares To Buy of " . $list[$ch - 1]->name . " : ";
    $amnt = validInt(Utility::getInt(), 0, 90000);
    $stock = $list[$ch - 1];
    $stock = new Stock($stock->name, $stock->price, $amnt);
    for ($i = 0; $i < count($account); $i++) {
        if ($account[$i]->name == $stock->name) {
            $account[$i]->quantity += $stock->quantity;
            echo "Bought $stock->quantity " . "$stock->name shares successfully";
            return $account;
        }
    }
    $account[]->quantity += $stock->quantity;
    echo "Bought $stock->quantity " . "$stock->name shares successfully";
    return $account;
}

function save($account)
{
    file_put_contents("Account.json", json_encode($account));
}

function menu($account)
{
    echo "Menu :\n";
    echo "Press 1 to Enter To Buy New Stock \nPress 2 to Sell Stocks\n";
    echo "Enter 3 to Print Stock Report\nEnter anything else to exit\n";
    $choice = Utility::getInt();
    //switch case to run according to condition
    switch ($choice) {
        case '1':
            $account = buy($account);
            echo "\n\n";
            menu($account);
            break;
        case '2':
            echo "\n\n";
            menu($account);
            break;
        case '3':
            report($account);
            menu($account);
            break;
        default:
            echo "press 1 to save";
            if (Utility::getInt() == 1) { 
                //var_dump($account); 
                save($account);
                echo "Transaction saved\n";
            }
            echo "Exit  ..!!!\n";
            break;
    }
}

function report($account)
{
        // /    var_dump($portfolio);
    $total = 0;
    echo "Stock Name | Per Share Price | No. Of Shares | Stock Price\n";
    foreach ($account as $key) {
        echo sprintf("%-10s | rs %-12u | %-13u | rs %u", $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
        $total += ($key->quantity * $key->price);
    }
    echo "Total Value Of Stocks is : " . $total . " rs\n";
    echo "enter to menu ";
    fscanf(STDIN,"%s\n");
}

function printStockList()
{
    $list = json_decode(file_get_contents("StockList.json"));
    echo "No | Stock Name | Share Price \n";
    $i = 0;
    foreach ($list as $key) {
        echo sprintf("%-1u. | %-10s | Rs %-12u ", ++$i, $key->name, $key->price) . "\n";
    }
    return $list;
}
$account = json_decode(file_get_contents("Account.json"));
menu($account);
?>
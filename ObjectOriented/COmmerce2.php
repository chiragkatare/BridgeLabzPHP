class to store data stru
<?php


/**
 * set top level error handler function to handle in case of error occurence
 * 
 */
set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
    echo "!!!!Error Occured!!!!!!!\n";
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    echo "Terminating!!!!!!!!!\n";

    die();
});

//require teh files from the below files
require("/home/bridgelabz/Chirag/BridgeLabzPHP/DataStructure/Stack.php");
require("/home/bridgelabz/Chirag/BridgeLabzPHP/DataStructure/Queue.php");
require("Utility.php");

/**
 * function to get valid integer from the console
 */
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
    private $account;
    private $stack;
    private $queue;

    public function __construct($account = [] , Stack $stack , Queue $queue)
    {
        $this->account = $account ;
        $this->stack = $stack;
        $this->queue = $queue; 
    }
    function getAccount()
    {
        return $this->account;
    }
    function getStack()
    {
        return $this->stack;
    }
    function getQueue()
    {
        return $this->queue;
    }
}

var_dump(new StockAccount());

/**
 * funtion to but stocks from the list and add it to the account
 */
function buy($account)
{
    //var_dump($account);
    //list var to store the list the stock to purachase from
    $list = printStockList();
    //askins use rfor input
    echo "Enter No with Stock To Buy : ";
    //var ch to store stock to buy
    $ch = validInt(Utility::getInt(), 1, 8);
    echo $list[$ch - 1]->name . " selected!\nEnter No Of Shares To Buy of " . $list[$ch - 1]->name . " : ";
    //amnt to store the no of shares to buy
    $amnt = validInt(Utility::getInt(), 0, 90000);
    //getting the stock from the list
    $stock = $list[$ch - 1];
    //creating new stock
    $stock = new Stock($stock->name, $stock->price, $amnt);
    //adding the stock to the account if already in the list and return
    for ($i = 0; $i < count($account); $i++) {
        if ($account[$i]->name == $stock->name) {
            $account[$i]->quantity += $stock->quantity;
            echo "Bought $stock->quantity " . "$stock->name shares successfully";
            return $account;
        }
    }
    //or else adds the new stack the end pf the list
    $account[] = $stock;
    echo "Bought $stock->quantity " . "$stock->name shares successfully";
    //waiting for user to see the result
    fscanf(STDIN, "%s\n");
    return $account;
}

/**
 * function to sell the stock from the list
 */
function sell($account)
{
    //show the stock from the list to the user
    printAccount($account);
    //taking the user input
    echo "Enter No with Stock To Sell : ";
    //validating the input
    $ch = validInt(Utility::getInt(), 1, count($account));
    echo $account[$ch - 1]->name . " selected!\nEnter No Of Shares To Sell of " . $account[$ch - 1]->name . " : ";
    $qt = validInt(Utility::getInt(), 1, $account[$ch - 1]->quantity);
    //removing the stock
    $account[$ch - 1]->quantity -= $qt;
    echo "sold $qt shares successfully";
    //check if the shares are empty to delete the entry completely
    if ($account[$ch - 1]->quantity == 0) {
        array_splice($account, ($ch - 1), 1);
    }
    fscanf(STDIN, "%s\n");
    return $account;
}

//function to save the stocks to the file
function save($account)
{
    file_put_contents("Account.json", json_encode($account));
}

//function to display the menu and run the program
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
            $account = sell($account);
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

/**
 * function to display the report of the stocks
 */
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
    fscanf(STDIN, "%s\n");
}

//function to print the stock currently in the stock
function printAccount($account)
{
    echo "No | Stock Name | Share Price | No. Of Shares | Stock Price \n";
    $i = 0;
    foreach ($account as $key) {
        echo sprintf("%-2u | %-10s | rs %-8u | %-13u | rs %u", ++$i, $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
    }
}

/**
 * function to print the list the stocks available to buy
 */
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

//checking the user account
$account = json_decode(file_get_contents("Account.json"));
//calling the user input
//menu($account);
?>
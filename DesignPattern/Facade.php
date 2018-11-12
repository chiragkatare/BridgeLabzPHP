<?php

/**
 * program is a demonstration of facade design pattern in php by taking the example of
 * bank and bank handler act as a facade
 */

/**
 * top level exception handler function to handle exception
 */
set_exception_handler(function ($e) {
    echo "\nException Occurred\n";
    echo $e->getMessage();
});

class BankAccount
{

    //variable to store the properties of simple bank account
    protected $name;
    protected $number;
    protected $amount;

    /**
     * parameterized constructor to initiate 
     */
    function __construct(int $number, int $amount, string $name)
    {
        $this->name = $name;
        $this->number = $number;
        $this->amount = $amount;

    }

    /**
     * function to return the amount in account
     */
    function getAmount()
    {
        return $this->amount;
    }

    /**
     * function to get the name of the bank account
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * function to get the account no
     */
    function getNumber()
    {
        return $this->number;
    }

    /**
     * function to add the amount/balance in the bank account
     */
    function addAmount(int $amount)
    {
        $this->amount += $amount;
    }

    /**
     * function to remove the amount fromn the account
     */
    function substractAmount(int $amount)
    {
        $this->amount -= $amount;
    }

}

/**
 * bank class to implement the bank behaviour
 */
class Bank
{

    // var bank account is an array yo store the bank accounts of the bank
    protected $accounts = [];

    function addAccount(BankAccount $account)
    {
        $this->accounts[] = $account;
    }

    /**
     * funcition to deposit the money in the acocunt of the bank
     */
    function deposit(int $index, int $amnt)
    {
        $this->accounts[$index]->addAmount($amnt);
    }

    /**
     * function to withdraw the money from the account
     */
    function withdraw(int $index, int $amnt)
    {
        $this->accounts[$index]->substractAmount($amnt);
    }

    /**
     * function to check if bank account is in the bank
     */
    function accountExist(int $accno)
    {
        for ($i = 0; $i < count($this->accounts); $i++) {
            if ($this->accounts[$i]->getNumber() == $accno) {
                return $i;
            }
        }
        return false;
    }
}

/**
 * facade class to  simplify the operation of the bank account
 */
class BankFacade
{
    public $bank;

    function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }

    /**
     * function to deposit the money in the given bank account
     */
    function deposit(int $accno, int $amnt)
    {
        if ($acc = ($this->bank->accountExist($accno)) !== false) {
            $this->bank->deposit($acc, $amnt);
            echo "Money Deposited\n";
        } else {
            echo "Bank Account Incorrect\n";
        }
    }

    /**
     * function to withdraw the money from the account
     */
    function withdraw(int $accno, int $amnt)
    {
        //checks the bank ccountis active 
        //the checks if sufficient money is there in the account
        if ($acc = ($this->bank->accountExist($accno)) !== false) {
            if ($this->bank->accounts[$acc]->getAmount() >= $amnt) {
                $this->bank->withdraw($amnt);
                echo "Money Withdrawed\n";
            }
            //if not sufficient money
            else {
                echo "insufficient Amount\n";
            }
        }
        //display message if account not found
        else {
            echo "Account Not Found\n";
        }
    }
}

//new bank
$bank = new Bank();
$bank->addAccount(new BankAccount(101, 1000, "akshansh"));
$bank->addAccount(new BankAccount(102, 1001, "chirag"));
//new bank facade
$bankfac = new BankFacade($bank);
$bankfac->deposit(101, 2000);

?>
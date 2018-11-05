<?php

class BankAccount{

    protected $name ; 
    protected $number ; 
    protected $amount ;

    function __construct(int $number , int $amount , string $name)
    {
        $this->name = $name ;
        $this->number = $number ; 
        $this->amount = $amount ;
        
    }

    function getAmount(){
        return $this->amount ;
    }

    function getName(){
        return $this->name ;
    }

    function getNumber(){
        return $this->number ;
    }

    function addAmount(int $amount){
        $this->amount += $amount ;
    }

    function substractAmount(int $amount){
        $this->amount -= $amount ;
    }

}

class Bank {

    protected $accounts = [ ] ;

    function addAccount(BankAccount $account){
        $this->accounts[] = $account ;
    }

    function deposit(int $index , int $amnt){
        $this->accounts[$index]->addAmount($amnt);
    }

    function withdraw(int $index , int $amnt ){
        $this->accounts[$index]->substractAmount($amnt);
    }

    function accountExist(int $accno){
        for ($i=0; $i <count($this->accounts) ; $i++) { 
            if($this->accounts[$i]->getNumber() == $accno){
                return $i ;
            }
        }
        return false ;
    }
}

class BankFacade{
    public $bank ; 
    
    function __construct(Bank $bank){
        $this->bank = $bank ;
    }

    function deposit( int $accno , int $amnt){
        if($acc = ($this->bank->accountExist($accno))!==false){
            $this->bank->deposit($acc , $amnt);
            echo "Money Deposited\n";
        }
        else {
            echo "Bank Account Incorrect\n";
        }
    }

    function withdraw(int $accno , int $amnt){
        if($acc = ($this->bank->accountExist($accno))!==false){
            if($this->bank->accounts[$acc]->getAmount()>=$amnt){
                $this->bank->withdraw($amnt);
                echo "Money Withdrawed\n";
            }
            else{
                echo "insufficient Amount\n";
            }
        }
        else{
            echo "Account Not Found\n";
        }
    }
}

$bank = new Bank();
$bank->addAccount(new BankAccount(101 , 1000 , "akshansh"));
$bank->addAccount(new BankAccount(102 , 1001 , "chirag"));
$bankfac = new BankFacade($bank);
$bankfac->deposit(101 , 2000);

?>
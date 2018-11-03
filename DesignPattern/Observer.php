<?php 

interface Subject{
    function attach();
    function detach();
    function update();
}

class PostOfiice implements Subject{

    private $mail = [];
    private $observer = [] ;
    
    public function addMail(Mail $m){
        $this->mail[] = $m ; 
    }
    public function getMails(){
        return $this->mail;
    }

    function attach(Person $pers){
        $this->observer[$pers];
    }
}

interface Observer{
     
}


?>

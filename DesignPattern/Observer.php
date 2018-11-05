<?php 

/**
 * Subject Interface to make subject implementation
 */
interface Subject
{
    /**
     * abstract methods 
     */
    function attach(Person $pers);
    function detach(Person $pers);
    function notify(Mail $mail);
}

/**
 * Class mail to make mail as an object
 */
class Mail{

    //var name to store the receivers name 
    public $sname;
    public $rname ;
    protected $message;

    function __construct(string $sname , string $message , string $rname ){
        $this->rname = $rname ;
        $this->message = $message ;
        $this->sname = $sname ;
    }

    function getMessage(){
        return $this->message;
    }
}

class PostOfiice implements Subject
{

    private $mail = [];
    private $observer = [];

    public function addMail(Mail $m)
    {
        $this->mail[] = $m;
        $this->notify($m);
    }
    public function getMails()
    {
        return $this->mail;
    }

    function attach(Person $pers)
    {
        $this->observer[] = $pers;
    }

    function detach(Person $pers){
        if (($key = array_search($pers, $this->observer)) !== false) {
            unset($this->observer[$key]);
        }
    }

    function notify(Mail $mail){
        for ($i=0; $i < count($this->observer); $i++) { 
            if($this->observer[$i]->name == $mail->rname ){
                $this->observer[$i]->update($mail);
            }
        }
    }

}

interface Observer
{
    function update(Mail $mail);
}

class Person implements Observer
{
    public $name ;

    function __construct(string $name ){
        $this->name = $name ;
    }

    function update(Mail $mail){
        echo "New Mail to ".$mail->rname." - ".$mail->getMessage()."from $mail->sname\n" ;
    }
}

$post= new PostOfiice();

$akku = new Person("akshansh");
$nishu = new Person("nishant");
$post->attach($akku);
$post->attach($nishu);
$mail = new Mail("akshansh", "Where are you ?","nishant");
$post->addMail($mail);


?>

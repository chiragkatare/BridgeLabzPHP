<?php
class UserName{
    function get_name(){
        $output =  "Hello <<UserName>>, How are you";
        $name = readline("enter your name");
         $output =  str_replace("<<UserName>>",$name, $output);
        echo $output ;
    }
}
?>
<?php
$user = new UserName() ;
$user->get_name();
?>
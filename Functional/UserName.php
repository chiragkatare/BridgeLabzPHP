<?php
/**
 * User Input and Replace String Template “Hello <<UserName>>, How are you?”
 * @author chiragkatare
 * @version 2.0   
 * @since 15-10-2018
 */
class UserName{
    /** 
     * take user name and replace in the string
     */
    function get_name(){
        $output =  "Hello <<UserName>>, How are you";
        $name = readline("enter your name");
         $output =  str_replace("<<UserName>>",$name, $output);
        echo $output ;
    }
}
?>
<?php
//var user for user name
$user = new UserName() ;
//calling method
$user->get_name();
?>
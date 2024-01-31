<?php
//database connection
class Dbh{

    protected function connect(){
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=ooplogin', $username,$password); //PDO - PHP data object
            return $dbh;
        } catch (PDOException $e) {
            print "Error!:". $e->getMessage() . "<br/>";
            die();
        }
    }

    
}
?>
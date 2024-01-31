<?php
//If we want to change something inside database we re going to do it here

class Signup extends Dbh{

    protected function setUser($uid,$pwd,$email){ //properties from controller class
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd,users_email) VALUES (?,?,?)');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);


        if(!$stmt->execute(array($uid,$hashedPwd,$email))){
          $stmt = null;
          header("location: ../index.php?error=stmtfailed");
          exit();

        }
         $stmt = null;
       
    }
    protected function checkUser($uid,$email){ //properties from controller class
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid=? OR users_email = ?;'); //creating connecton from dbh
       //?-these act as a place holder that we then later on can assign to this query and the while idea is that we can actually run the query into the database first and then after wards we can then submit the data that needs to be filled in and in this sort of way we can actually prevent sql injection into our database cuz we seperate the data from the query

        if(!$stmt->execute(array($uid,$email))){ //if we have more than one piece of data we have to use array
          $stmt = null;
          header("location: ../index.php?error=stmtfailed");
          exit();

        }
         
        $resultcheck;
        if($stmt->rowCount() > 0){  //if there user inside a database it returns at least one users
            $resultcheck = false;
        }
        else{
            $resultcheck = true;
        }
 
        return $resultcheck;
    }
        
    

    
}
?>
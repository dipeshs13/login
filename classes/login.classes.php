<?php


class Login extends Dbh{

    protected function getUser($uid,$pwd){ 
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');

       

        if(!$stmt->execute(array($uid,$uid ))){ //checking if we have any kind of erros when it comes to executing this statement
          $stmt = null;
          header("location: ../index.php?error=stmtfailed");
          exit();

        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC); //FETCH_ASSOC returns associative array
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if(!$checkPwd){
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        else if($checkPwd){
            $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');

            if(!$stmt->execute(array($uid,$uid,$pwd ))){ 
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
      
              }
      
            //   if($stmt->rowCount() == 0){
            //     $stmt = null;
            //     header("location: ../index.php?error=usernotfound");
            //     exit();
            // }
            // $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($loginData)==0){
                $stmt = null;
                header("location:login.php?error=usernotfound");
                // echo "usernotfound";
                exit();
            }

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];  //used to store usersid to keep track of the users identity acroos different pages and request.
            $_SESSION["useruid"] = $user[0]["users_uid"];

            $stmt = null;
        }


         $stmt = null;
       
    }
    

    
}
?>
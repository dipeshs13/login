<?php
//If we want to change something inside database we re going to do it here

class signupContr extends Signup{

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid,$pwd,$pwdRepeat,$email){  //these varibales are data grab from user
        //grab the data that the user submitted using the signup form and assign them to these properties in here
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }
    public function signupUser() {
         if($this->emptyInput() == false){
            // echo "Empty input";
            header("location: ../index.php?error=emptyinput");
            exit();
         }
         if($this->invalidUid() == false){
            // echo "Invalid username";
            header("location: ../index.php?error=username");
            exit();
         }
         if($this->invalidEmail() == false){
            // echo "Invalid email";
            header("location: ../index.php?error=email");
            exit();
         }
         
         if($this->pwdMatch() == false){
            // echo "Password don't match";
            header("location: ../index.php?error=passwordmatch");
            exit();
         }
         if($this->uidTakenCheck() == false){
            // echo "Username or emai taken ";
            header("location: ../index.php?error=usernameoremailtaken");
            exit();
         }
        
         $this->setUser($this->uid,$this->pwd,$this->email);
        }
    private function emptyInput() {
        //Checking the empty input
        $result;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
        }

    private function invalidUid(){
        $result;
        $pattern = '/^[a-zA-Z0-9_]{5,}$/';
        if(!preg_match($pattern, $this->uid)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function invalidEmail(){
        $result;
        
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function pwdMatch(){
        $result;
        if($this->pwd !== $this->pwdRepeat){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck(){
        $result;
        if(!$this->checkUser($this->uid,$this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
   
    
}
?>

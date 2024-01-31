<?php
//login contro

class LoginContr extends Login{

    private $uid;
    private $pwd;
   

    public function __construct($uid,$pwd,){  //these varibales are data grab from user
        //grab the data that the user submitted using the signup form and assign them to these properties in here
        $this->uid = $uid;
        $this->pwd = $pwd;
    }
    public function loginUser() {
         if($this->emptyInput() == false){
            // echo "Empty input";
            header("location: ../index.php?error=emptyinput");
            exit();
         }
      $this->getUser($this->uid,$this->pwd);
        }
    private function emptyInput() {
        //Checking the empty input
        $result;
        if(empty($this->uid) || empty($this->pwd)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
        }


   
    
}
?>
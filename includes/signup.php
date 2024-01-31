<?php

if(isset($_POST["submit"])) //isset check the variable is set or nots
{
   
  //Grabing the data
  $uid = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["repeatpwd"];
  $email = $_POST["email"];

  //Instantiate SignupContr class
  include "../classes/dbh.classes.php";
  include "../classes/signup.class.php";
  include "../classes/signup.contro.php";
  $signup = new signupContr($uid,$pwd,$pwdRepeat,$email);


  //Running error handlers and user signup
 $signup->signupUser();


  //Going to back to front page
  header("location: ../index.php?error=none");
  
}
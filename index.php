<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <div>
                <h3>REGISTER / LOGIN</h3>
                <ul class="main-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">PRODUCTS</a></li>
                    <li><a href="#">CURRENT SALES</a></li>
                    <li><a href="#">MEMBER</a></li>
                </ul>
            </div>
            <ul class="menu-member">
                <?php
                 if(isset($_SESSION["userid"]))
                 {
                
                echo '<li><a href="#">'. $_SESSION["userid"].'</a></li>';
               echo '<li><a href="includes/logout.inc.php" classes="header-login-a">LOGOUT</a></li>';
                
                 }
                 else{
                 
                 echo '<li><a href="#">SIGNUP</a></li>';
                 echo'<li><a href="#" class="header-login-a">LOGIN</a></li>';

                 }
                 ?>
            </ul>
        </nav>
    </header> 
  <!-- code not written skiped -->
  <section class="index-login">
    <div class="wrapper">
        <div class="index-login-signup">
            <h4>SIGNUP</h4>
            <p>Don't have an account yet? Sign up here!</p>
            <form action="includes/signup.php" method="post">
                <input type="text" name="uid" id="" placeholder="Username">
                <input type="password" name="pwd" id="" placeholder="Password">
                <input type="password" name="repeatpwd" id="" placeholder="Repeat Password">
                <input type="text" name="email" id="" placeholder="Email">
                <br>
                <button type="submit" name="submit"> SIGNUP</button>
            </form>
        </div>
        <div class="index-login-login">
            <h4>LOGIN</h4>
            <p>Don't have an account yet? Signup up here!</p>
            <form action="includes/login.php" method="post">
                <input type="text" name="uid"placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="submit"> LOGIN</button>
            </form>
        </div>
    </div>
  </section>
</body>
</html>
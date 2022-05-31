<!-- Index.php -->
<?php

    session_start();
    $_SESSION["loggedin"] = false;
    $_SESSION["username"] = "";
    $_SESSION["department"] = "";
    $_SESSION["firstname"] = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

}
    
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
            
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>
            Largo - HRMS
        </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>

    <body>
        <div class="jumbotron text-center">
            <p>
            <img src="image/logo.jpg" class="img-circle" width="200" height="200" alt="Cinque Terre"></p> 
        
            <h1>LARGO TRADING PVT LTD</h1>
            <p>Human Resource Management System</p>
          </div>
        

        <div class="container text-center" >
            <form  name = "regform" method="post" action= "home_user.php" >
                <div class="col-xs-5 col-xs-offset-3">
                        <input type="text" id="username" name="username" class="form-control input-lg input-forme"   placeholder="User Name" ><br>
                        <input type="password" name="password" id="password" class="form-control input-lg input-forme"   placeholder="password" ><br>
                        <input type="submit" class="btn btn-success" value="Submit Button">
                </div>
                
            </form>


        </div>
        <br>
        <br>

        <div class="container text-center p-t-12">
            <span class="text-muted">
                Forgot
            </span>
            <a class="text-success" href="resetpass">
                Username / Password?
            </a>

        </div>
        
        <div class="text-center p-t-12">
            <span class="text-muted">
                New User
            </span>
            <a class="text-success" href="signup.php">
                Add new Account
            </a>

        </div>
        <br>

        <div class="panel-footer">

            <div > <p align='center'  class="text-primary">&copy 2021 Largo Trading Pvt Ltd. All Rights Reserved</p></div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
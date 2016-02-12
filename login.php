<!doctype html>
<?php
  $_SESSION["error"];
  session_start();
  //echo($_SESSION["error"]);
  if (isset ($_POST['submit']))
    if(empty($_POST['username']) || empty($_POST['password']))
      //echo("Both username and password are required");
      $_SESSION["error"] = 2;
    else
    {
      $dbcnx = @mysql_connect("localhost", $_POST['username'], $_POST['password']);
      if (!$dbcnx)
      { 
        
        //echo( "<p>Incorrect username and/or password.</p>" );
        $_SESSION["error"] = 1;
        header("Location: login.php");
        exit();
      }
      $_SESSION["error"] = 0;
      $_SESSION['user'] = $_POST['username'];
      $_SESSION['pass'] = $_POST['password'];
      header("Location: navpage.html");
    }
?>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body >

        <div class="container" id="loginBox">
            <div id="logo">
                <h2 class="text-center">Card Database</h2>
                <img src="img/logoT.png" id="superfightLogo" alt="superfightLogo">
            </div>
            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
              </div>
              <div id="buttonClass" class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button id="login-submit" name="submit" type="submit" class="btn btn-default btn-lg">Sign in</button>
                </div>
              </div>
            </form>
            <?php
                if ($_SESSION["error"] == 1) {
                  echo("<div id='errorMsg' name='errorMsg' style='visibility: visible;'>
                            <h4><strong>Incorrect username and/or password.</strong></h4>
                      </div>");
                }
                else if ($_SESSION["error"] == 2) {
                  echo("<div id='errorMsg' name='errorMsg' style='visibility: visible; left:4%;'>
                            <h4><strong>Both username and password are required</strong></h4>
                      </div>");
                }
            ?>
        </div>
    <!-- Scripts -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>

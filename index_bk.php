<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = mysqli_real_escape_string($db,$_POST['inputEmail']);
        $pass = mysqli_real_escape_string($db,$_POST['inputPassword']);

        $sql = "SELECT person_id FROM login WHERE email = '$email' and pass = '".MD5($pass)."'";
        $result = mysqli_query($db,$sql);
        $count = mysqli_num_rows($result);
        $error = "Not set";

        if($count == 1) {

            $_SESSION['login_user'] = $email;
            header("Location: /login/info.php");

        }
        else {

            $error = "Your Login Name or Password is invalid";
        }
   }
?>

<!DOCTYPE html>
<!-- saved from url=(0041)https://getbootstrap.com/examples/signin/ -->
<html lang="en" class="gr__getbootstrap_com">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Sign In Page</title>

    <!-- Bootstrap core CSS -->
    <link href="./Signin Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./Signin Template for Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Signin Template for Bootstrap_files/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Signin Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-gr-c-s-loaded="true" cz-shortcut-listen="true">

    <div class="container">

        <form class="form-signin" action = "" method = "POST">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required="">

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

        <div style = "font-size:11px; color:#cc0000; margin-top:10px; text-align: center;"><?php echo $error; ?></div>


    </div>
    <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Signin Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>


</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span>

</html>

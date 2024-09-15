<?php
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NSCC</title>
  <link rel="icon" type="image/x-icon" href="images/logo1.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="custom.js"></script>
</head>

<body>
                    
<?php

//  session_start();
$email=@$_SESSION['email'];

?>

<?php
// session_start();
if (isset($_SESSION["email"])) {
    header("Location:dashboard.php");
    // exit();
}
?>

<?php 

// include 'signup_data.php'; 

?>

<?php
// session_start();

if (isset($_SESSION["email"])) {
    header("Location:dashboard.php");
    // exit();
}

$email = $_GET['email'];
?>


<div class="container-fluid container">
    <div class="row">

        <div class="col-md-12 log_data">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 b_order">
                    <section class="login">
                        <h2>Login</h2>
                        <form method="POST" action="login_val.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>"  placeholder="Email Id" autofocus>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="pass_word" class="form-control" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <?php
                                if (isset($_SESSION['login_error'])) {
                                    echo "<p style='color: red;'>" . $_SESSION['login_error'] . "</p>";
                                    unset($_SESSION['login_error']);
                                }
                                ?>
                            </div>
                            <div class="mb-3 style">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button type="submit" class="btn btn-primary">Login</button>
                                <p>Don't have an account? <a href="signup.php"> SignUp </a> </p>
                                <a href="forgot.php"> Forgot Password?</a>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
</div>


</body>

</html>

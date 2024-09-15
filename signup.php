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

include 'signup_data.php'; 

?>
<div class="container container-fluid sign_up">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <section class="login">
                        <h2>SignUp</h2>

                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo $name; ?>" autofocus>
                                <span class="error"> <?php echo $nameErr; ?></span>
                            </div>
                            <div class="mb-3">
                                <input name="phone_no" type="number" class="form-control" placeholder="Phone no" value="<?php echo $phone_no; ?>">
                                <span class="error"> <?php echo $phone_noErr; ?></span>

                            </div>
                            <div class="mb-3">
                                <input name="email" type="email" class="form-control" placeholder="Email ID" value="<?php echo $email; ?>">

                                <span class="error"> <?php echo $emailErr; ?></span>
                            </div>
                            <div class="mb-3">
                                <input name="pass_word" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="mb-3">                            
                            </div>

                        
                            <div class="mb-3 style login-link">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button name="submit" type="submit" class="btn btn-primary">SignUp</button>
                                Already have an account? <a href="login.php"> Login</a> 



                            </div>
                        </form>
                    </section>
                </div>
                <div class="col-md-3"></div>
        </div>
    
</div>

</body>

</html>

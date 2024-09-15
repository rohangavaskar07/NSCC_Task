<?php
include_once 'config_db.php';
session_start();
if (!isset($_SESSION["email"])) {
    header("Location:login.php");
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];
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
    <div class="container container-fluid admin-profile">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">

                <div class="p_image">
                    <h2 style="text-align:center"> <?php echo $name; ?> Profile</h2>
                    <?php
                    $sql = "SELECT * FROM `NSCC` . `users` where `email` = '{$email}'";
                    $result = mysqli_query($conn, $sql) or die("user data not found");

                    if (mysqli_num_rows($result) > 0) {
                    ?>
                        <div>
                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <img src="pp.png" alt="profile_pic" width="100px" height="100px">
                                <form action="logout.php" method="POST" enctype="multipart/form-data">
                                    <div>
                                        <label for="name" class="form-group up_profile">Name:</label>
                                        <input type="text" name="name" disabled class="form-control" value="<?php echo $row['name']; ?>">
                                    </div>
                                    <div>
                                        <label for="email" class="form-group up_profile">Email ID:</label>
                                        <input type="email" class="form-control" disabled value="<?php echo $row['email']; ?>">
                                        <input type="email" hidden name="email_id" disabled class="form-control" value="<?php echo $row['email']; ?>">
                                    </div>
                                    <div>
                                        <a href="logout.php"><button class="btn btn-primary">Logout</button></a>
                                    </div>
                                <?php } ?>
                                </form>
                            <?php } ?>
                        </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
</body>

</html>
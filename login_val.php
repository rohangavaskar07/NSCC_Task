<?php include_once 'config_db.php';
session_start();
// $email_id = $_POST['email'];

$email_id = mysqli_real_escape_string($conn, $_POST['email']);
$pass_word = $_POST['pass_word'];


$sql = "SELECT email, password FROM `NSCC` .`login_details` WHERE email = '$email_id'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $d_password = $row['password'];

    if (password_verify($pass_word, $d_password)) {
        $sql1 = "SELECT `email`, `name`, `phone` FROM `NSCC` . `users` WHERE `email` = '$email_id'";
        $result1 = mysqli_query($conn, $sql1);

        if ($result1 && mysqli_num_rows($result1) > 0) {
            $row1 = $result1->fetch_assoc();

            $_SESSION['name'] = $row1['name'];
            $_SESSION['email'] = $row1['email'];
            $_SESSION['phone'] = $row1['phone'];

            header("Location:dashboard.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Failed to fetch user details.";
            header("Location:login.php");
            exit();
        }
    } else {

        $_SESSION['login_error'] = "Please enter the correct password.";
        header("Location:login.php");
        exit();
    }
} else {
    $_SESSION['login_error'] = "Your email-id is not registered with us.";
    header("Location:login.php");
    exit();
}
$conn->close();
?>
<?php include 'config_db.php'; ?>

<?php
// session_start();
$name  = $phone_no = $email  = $pass_word = "";
$nameErr  = $phone_noErr = $emailErr = $pass_wordErr =  "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $is_valid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $is_valid = false;
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $is_valid = false;
        }
    }


    if (empty($_POST["phone_no"])) {
        $phone_noErr = "Phone no is required";
        $is_valid = false;
    } else {
        $phone_no = test_input($_POST["phone_no"]);
        if (!preg_match("/^[0-9]{10}$/", $phone_no)) {
            $phone_noErr = "Invalid Phone no format";
            $is_valid = false;
        }
    }



    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $is_valid = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $is_valid = false;
        }
    }

    if (empty($_POST["pass_word"])) {
        $pass_wordErr = "Password is required";
        $is_valid = false;
    } else {
        $pass_word = ($_POST["pass_word"]);
        $hashed_password = password_hash($pass_word, PASSWORD_DEFAULT);
    }



   

    if ($is_valid) {
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }


        mysqli_begin_transaction($conn);
        $email_id = $_POST['email'];
        $email = $_POST['email'];
        $phone_no = $_POST['phone_no'];
        $pass_word = $_POST['pass_word'];

        // $s_btn = $_POST['submit'];

        try {
            $pass_enc = password_hash($pass_word, PASSWORD_BCRYPT);
            $fetch_email = "SELECT * FROM `NSCC` . `login_details` WHERE email = '$email_id'";
            $fetch_phone = "SELECT * FROM `NSCC` . `users` WHERE phone = '$phone_no'";

            $check_email = mysqli_query($conn, $fetch_email);
            $check_phone = mysqli_query($conn, $fetch_phone);
            $count = mysqli_num_rows($check_email);
            $count2 = mysqli_num_rows($check_phone);

            if ($count == 0 && $count2 == 0) {
                // echo 'asdfasd';


                mysqli_begin_transaction($conn);

                $name = mysqli_real_escape_string($conn, $name);
                $email_id = mysqli_real_escape_string($conn, $email_id);
                $phone_no = mysqli_real_escape_string($conn, $phone_no);
                $pass_enc = mysqli_real_escape_string($conn, $pass_enc);

                $sql_user = "INSERT INTO `NSCC` . `users` (`name`, `email`,`phone`) VALUES ('{$name}','{$email_id}','{$phone_no}');";
                $sql_pass = "INSERT INTO `NSCC` . `login_details` (`email`,`password`) VALUES ('{$email_id}','{$pass_enc}');";


                $signup_result = mysqli_query($conn, $sql_user);
                if ($signup_result) {
                    $signup_pass = mysqli_query($conn, $sql_pass);
                    if ($signup_pass) {
                        mysqli_commit($conn);
                        header("Location:login.php?email=$email");
                        exit();
                    } else {
                        mysqli_rollback($conn);
                        $pass_wordErr = "Failed to insert password details";
                    }
                } else {
                    mysqli_rollback($conn);
                    $nameErr = "Failed to insert user details";
                }
            } else {
                $emailErr = "Email id or phone no already exists";
            }
        } catch (Exception $e) {

            mysqli_rollback($conn);
            echo $e->getMessage();
            header("Location:signup.php");
            exit();
        } finally {
            mysqli_close($conn);
        }
    }
}



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
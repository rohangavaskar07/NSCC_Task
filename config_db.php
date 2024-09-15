<?php
 
    $servername = "localhost";
    $username = "root";

    $password = "sfshdJ98765*(&^%$#";
    //  $password = "";
    // $password = "sfddsf^%sdfsdf745";


    $database ="NSCC";
    // $conn = '';

    try {
        // $conn = '';
        $conn = mysqli_connect($servername, $username, $password , $database);


    }

    catch(Exception $e) {
    echo mysqli_connect_error();
    print_r($e);
    }


    // print_r($conn);
    

    if (!$conn){
        die('DB not connected');
    }

?>
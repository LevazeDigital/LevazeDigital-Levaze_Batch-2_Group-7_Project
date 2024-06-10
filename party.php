<?php
    if(isset($_POST['submit'])){
        // set connection variables
        $server = "localhost";
        $username = "root";
        $password = "samiya";
        $database = "ayandb";

        // create a databse connection
        $con = mysqli_connect($server, $username, $password, $database);

        // ?check forr connection is successful or not
        if(!$con){
            die("connectio to this database failed due to". mysqli_connect_error());
        }
        else {
            echo "successfylly connected";
        }
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $signup_email = $_POST['signup_email'];
        $signup_password = $_POST['signup_password'];
       

        // $dt = date("Y-m-d H:i:s");
        $sql = "INSERT INTO ayandb.logintable(fullname,phone,signup_email,signup_password) VALUES ('$fullname','$phone','$signup_email','$signup_password')";


        if($con->query($sql) == true){
            
            // echo "successfully inserted";
            header("Location:index.html");
            // alert "Congratulations you have login succesfully";
        }else {
            echo "Error: " . $con->error;
        }

    }
    function checkayandb($username,$password)
{
    global $con;
    $que="select * from ayandb where username='$username'";
    $res=$con->query($que);
    return $res->num_rows>0;
    }
?>
<?php
    include("dbconnect.php");

    if(isset($_POST['submits'])){
        $username = $_POST['Username'];
        $password = $_POST['Password'];

        $sql = "SELECT * FROM signup where Username = '$Username' and Password = '$Password'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count != 0)
        {
            header("Location:home.php");
        }
        else{
            echo '<script>
            window.location.href = "loginpage.php";
            alert("Login Failed. Invalid username or password!!!");
            </script>';
        }

    }
?>




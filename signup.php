<?php
include("dbconnect.php");

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username already exists
    $check_query = "SELECT * FROM signup WHERE username='$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo '<script>
                alert("username already exists. Please choose a different one.");
                window.location.href = "signuppage.php";
              </script>';
        exit();
    } else {
        // Proceed with signup
        $insert_query = "INSERT INTO signup (firstname, lastname, age, Address, username, Password) VALUES ('$firstname', '$lastname', '$age', '$address', '$username', '$password')";
        if (mysqli_query($conn, $insert_query)) {
            echo '<script>
                    alert("Account Created Successfully!");
                    window.location.href = "home.php";
                </script>';
            exit();
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
    }
}

?>

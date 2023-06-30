<?php
// Assuming you have already established the database connection

// Check if the form is submitted

//link with database
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['psw'];
    session_start();
    $_SESSION['username'] = $username;

    // To prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check the credentials
    $sql = "SELECT * FROM credentials WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo "<h1><center>Login successful</center></h1>";

        // Fetch the userID from the database
        $userIDSql = "SELECT userID FROM credentials WHERE username = '$username' AND password = '$password'";
        $userIDResult = mysqli_query($conn, $userIDSql);

        if(mysqli_num_rows($userIDResult) > 0) {
            $row = mysqli_fetch_assoc($userIDResult);
            $userID = $row['userID'];

            // Assign the userID to a session variable
            $_SESSION['userID'] = $userID;

            // Redirect to home-page.php
            echo '<script>window.location.href = "home-page.php";</script>';
        } else {
            echo "Error retrieving userID.";
        }
    } else {
        echo "<h1><center>Login failed. Invalid username or password.</center></h1>";
    }
}
?>

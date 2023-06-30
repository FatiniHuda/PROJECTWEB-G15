<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>

    body{
        /*
          Image source: https://unsplash.com/photos/bmpMwZ_Rfxs
          */
        background-image: url("image/orchad.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        display: flex;
        min-height: 100vh;
    }

    .container {
        max-width: 500px;
        margin: 0 auto;
        padding: 60px;
        border: 1px solid #ccc;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        display: flex;
        border-radius: 12px;
        background-color: #f1f1f1;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 110%;
    }
    
    h2 {
        text-align: center;
    }
    
    label {
        display: block;
        margin-bottom: 10px;
    }
    
    input[type="text"], [type="submit"],  [type="password"]
    {
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 12px;
        background: #f1f1f1;
        text-align: center;
        border: 1px solid #ccc;
        display: inline-block;
    }
    
    input[type="submit"] {
        background-color: #04AA6D;
        color: white;
        cursor: pointer;
        width: 100%;
    }
    
    input[type="submit"]:hover {
        background-color: #45a049;
    }

    span.login{
        justify-content: center;
        align-items: center;
        display: flex;
    }

    
</style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <br>
        <form onsubmit="return validateForm();" method="POST">
            <label style="text-align: center;" for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" id="user" name="username" >
            
            <label style="text-align: center;" for="password"><b>New Password</b></label>
            <input type="password"  placeholder="Enter Password" id="password" name="password" >
            <br>

            <input type="submit" value="Reset Password" name="submit" onclick="validateForm()">

            <span class="login">Back to<a href="Login.php">Login</a></span>
        </form>
    </div>
    
    <!-- link with database -->
    <?php
    include("db.php");

    if (isset($_POST['submit'])) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        // Prepare the SELECT query
        $selectQuery = "SELECT * FROM credentials WHERE username = ?";
        $selectStmt = $conn->prepare($selectQuery);
        $selectStmt->bind_param("s", $username);
        $selectStmt->execute();

        $result = $selectStmt->get_result();

        if ($result->num_rows > 0) {
            // Prepare the UPDATE query
            $updateQuery = "UPDATE credentials SET password = ? WHERE username = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("ss", $password, $username);
            $updateStmt->execute();

            if ($updateStmt->affected_rows > 0) {
                ?>
                    <script>
                         alert ("Password reset successful.");
                    </script>
                 <?php
            } 

            else {
                ?>
                    <script>
                         alert ("Password reset not successful. ");
                    </script>
                 <?php
            }

        }

         else {
            echo '<span style="color: white;">User not found. Please try again with the correct username.</span>';
        }

        $selectStmt->close();
        
    }
?>
</body>
</html>
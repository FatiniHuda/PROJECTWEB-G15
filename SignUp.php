<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>

    <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
           /*
          Image source: https://unsplash.com/photos/bmpMwZ_Rfxs
          */
          background-image: url("image/orchad.jpg");
          background-size: cover;
          background-repeat: no-repeat;
        }
        * {box-sizing: border-box}
        
        /* Full-width input fields */
        input[type=text], input[type=password] {
          width: 100%;
          padding: 15px;
          margin: 5px 0 22px 0;
          display: inline-block;
          border: 1px solid #ccc;
          background: #f1f1f1;
          border-radius: 12px;
        }
        
        input[type=text]:focus, input[type=password]:focus {
          background-color: #ddd;
          outline: none;
        }
        
        hr {
          border: 1px solid #f1f1f1;
          margin-bottom: 25px;
        }
        
        /* Set a style for all buttons */
        button {
          background-color: #04AA6D;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
          opacity: 0.9;
        }
        
        button:hover {
          opacity:1;
        }
        
        /* Extra styles for the cancel button */
        .cancelbtn {
          padding: 14px 20px;
          background-color: #f44336;
        }
        
        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn, .signupbtn {
          float: left;
          width: 50%;
        }
        
        /* Add padding to container elements */
        .container {
          padding: 16px;
        }
        
        .content{
          max-width: 500px;
          margin: auto;
          padding: 9px;
          background-color: #f1f1f1;
          border-radius: 12px;
          padding: 20px;
        }
        
        span.login{
          justify-content: center;
          align-items: center;
          display: flex;
        }
        
        /* Clear floats */
        .clearfix::after {
          content: "";
          clear: both;
          display: table;
        }
        
        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
          .cancelbtn, .signupbtn {
             width: 100%;
          }
        }
        </style>
</head>
<body>

<div class="content">

  <form style="border:1px solid #ccc" method="POST" onsubmit="return validateForm()">
    
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" id="user" name="user" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="psw" name="psw" required>

            <label for="pswrepeat"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm Password" id="pswrepeat" name="pswrepeat" required>
    
            <div class="clearfix">
                <button type="button" class="cancelbtn" onclick="cancelReset()">Cancel</button> 
                <button type="submit" class="signupbtn" name="submit">Sign Up</button><br>
            </div>
      </div>
</div>
        
  <script>
      function cancelReset() { 
      window.location.href = "Login.php"; 
      // Replace "loginPage.php" with the URL of login page
      }
  </script>
  
  </form>
        
          <!-- validation  -->
      <script>
          function validateForm() {
          var username = document.getElementById("user").value;
          var password = document.getElementById("psw").value;
          var pswrepeat = document.getElementById("pswrepeat").value;

              if (username === "" || password === "" || pswrepeat === "") {
                  alert("Please fill in all fields");
                  return false;
              }

              if (password !== pswrepeat) {
                  alert("Passwords do not match");
                  return false;
              }

              return true;
            }
     </script>
</body>

    <!-- link with database  -->
    <?php
    include 'db.php';  

    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['psw'];

        $query = "INSERT INTO credentials (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Registration successful');</script>";
            echo '<script>window.location.href = "Login.php";</script>';

        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>

</html>
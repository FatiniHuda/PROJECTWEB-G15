<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        form {
          border: 3px solid #f1f1f1;
          background-color: #f1f1f1;
          border-radius: 12px;
          padding: 15px;
          width: 450px
        }

        .content {
        max-width: 500px;
        margin: auto;
        padding: 9px;
      }
        
        input[type=text], input[type=password] {
          width: 80%;
          padding: 15px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
          border-radius: 12px;
          background: #f1f1f1;
        }
        
        button {
          background-color: #04AA6D;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 80%;
          border-radius: 12px;
          align-items: center; 
          justify-content: center;
        }
        
        button:hover {
          opacity: 0.8;
        }
        
        
        .imgcontainer {
          text-align: center;
          margin: 24px 0 12px 0;
        }
        
        img.profile {
          width: 80px;
          border-radius: 90px;
        }
        
        span.psw {
          float: right;
          padding-top: 16px;
        }

        span.acc {
          float: left;
          padding-top: 16px;
        }

        .container{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
          span.psw {
             display: block;
             float: none;
          }
        }
        </style>
</head>
<body>
    <div class="content">

      <h2 style="color: MediumSeaGreen; text-align: center; ">Haji Jais Cooperative System</h2>
      <h3 style=" text-align: center;">Login</h3>

      <form name="f1" action = "authentication-login.php" onsubmit = "return validation()" method = "POST">

      <div class="imgcontainer">
        <!-- Image source: https://www.vecteezy.com/free-vector/profile-icon -->
        <img src="image/profile.jpg" alt="Profile" class="profile"> 
      </div>

           <div class="container">

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" id="user" name="user" required>
            <br>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id ="pass" name="psw" required> 
            
            <button id="login-btn" onclick="validation()" type="submit">Login</button> 
    
            <span class="acc"><a href="SignUp.php">Don't have an account?</a></span>
            <span class="psw"><a href="forgot-password.php">Forgot password?</a></span>
           </div>

      </div>
</form>
      </div>
</body>
<script>  
    function validation()  
    {  
        var id=document.f1.user.value;  
        var ps=document.f1.pass.value;  

        if(id.length=="" && ps.length=="") {  
            alert("Username and Password fields are empty");  
            return false;  
        }  
        else  
        {  
            if(id.length=="") {  
                alert("Username is empty");  
                return false;  
            }   
            if (ps.length=="") {  
            alert("Password field is empty");  
            return false;  
            }  

            else{

              document.getElementById('login-btn').addEventListener('click', function(event) {
              event.preventDefault(); // Prevent form submission (if the button is inside a form element)
              });

            }
        }                               
    }  
</script>
</html>
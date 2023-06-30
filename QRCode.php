<?php
  session_start();
  include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        padding: 20px;
        background-color: rgb(109, 122, 52);
      }
      
      h1 {
        margin-bottom: 20px;
      }
      
      .form-container {
        margin-bottom: 20px;
        
      }
      
      #qrcode-container {
        display: flex;
        justify-content: center;
      }
      
      canvas {
        border: 1px solid #333;
      }

      .qr-content{
        max-width: 500px;
        margin: auto;
        padding: 30px;
        border-radius: 12px;
        background-color: #f1f1f1;
        display: inline-block;
        border: 1px solid #ccc;
      }

      nav {
          background-color: #344735;
          color: #fff;
          padding: 10px;
          font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;;
        }

        nav ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
        }

        nav ul li {
         display: inline;
         margin-right: 10px;
        }

        nav ul li a {
        color: #fff;
        text-decoration: none;
        }

        header {
          height: 10%;
          display: flex;
          background-color: #1c502d;
        }

        header img {
          background-size:cover ;
        }

        header .heading {
          display: flex;
          font-style: italic;
          justify-content: center;
          align-items: center;
          margin-left: 06%;
          color: #fff;
          font-size: 50px;
          text-align: center;
        }
    </style>
</head>
<body>
<header>
    <img src="family 2.0.jfif" alt="">
    <h1 class="heading">QR Code Generator</h1>
  </header>
<nav>
    <ul>
      <li><a href="home-page.php">Home |</a></li>
      <li><a href="Cooperative-Information.php">Cooperative Information |</a></li>
      <li><a href="product.php"> Product |</a></li>
      <li><a href="Contact.php">Contact |</a></li>
      <li><a href="QRCode.php">QR Code |</a></li>
      <?php echo generateInvoiceLink(); ?>
      <?php echo generateNavigationLink(); ?>
    </ul>
  </nav>
<br>
<br>
  <div class="qr-content">
    <h1>Dynamic QR Code Generator</h1>

        <div class="form-container">
            <input type="text" id="text-input" placeholder="Enter text or URL">
            <button onclick="generateQRCode()">Generate QR Code</button>
        </div>

        <div id="qrcode-container">
            <img src="" id="qrcode">
        </div>
  </div>

      <script>
        let textinput = document.getElementById("text-input");
        let qrcode = document.getElementById("qrcode");
        function generateQRCode() {
          qrcode.src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + textinput.value;
        }
      </script>
</body>
</html>
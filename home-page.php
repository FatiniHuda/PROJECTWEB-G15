<?php
  session_start();
  include('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
        <style>
        body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: rgb(109, 122, 52);
        color: #fff;
        }

        nav {
        background-color: #344735;
        color: #fff;
        padding: 10px;
        }

        nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        }

        nav ul li {
        display: inline;
        margin-right: 10px;
        }

        nav ul li a {
        color: #fff;
        text-decoration: none;
        }

        main {
        padding: 20px;
        }

        section {
        margin-bottom: 20px;
        }

        footer {
        background-color: #1c502d;
        color: #fff;
        padding: 10px;
        text-align: center;
        }

        .centered-image {
        display: block;
        margin-left: auto;
        margin-right: auto;
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
  <header>
      <img src="family 2.0.jfif" alt="">
      <h1 class="heading">Welcome to Haji Jais Cooperative</h1>
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

  <main>
    <section >
      <h2 style="text-align: center;">About Us</h2>
      <p style="text-align: center;"> Koperasi Keluarga Hj Jais Johor Berhad is a cooperative company that produces agricultural products and sells fertilizers to small farmers around its area. in addition, this cooperative consists of 74 members. This cooperative has also been operating for 7 years. the manager of this company is Abd Rahim Bin Hj Jais who will be interviewed by us.</p>
      <p style="text-align: center;"> TL 113 , KAMPUNG PARIT HJ IDRIS 84800 BUKIT GAMBIR TANGKAK JOHOR</p>
      <p style="text-align: center;"> Concact Us | +60133496201     |  liasyafikk99@gmail.com  | </p>
    </section>

    <br>
      <section>
            <h2 style="text-align: center;" > Family of Haji Jais</h2>
            <img class="centered-image" src="image/image family.jfif" alt="Image" >
            <br>
      </section>

    <br> 
    <section>
          <br>
          <h3 style="text-align: center;"> korporathjjais@gmail.com</h3>
          <h4 style="text-align: center; background-color: #256d3d;">MON-FRI : 8AM-8PM</p>
          <p style="text-align: center; background-color: #256d3d;"> SATURDAY: 9AM-7PM</p>
          <P> SUNDAY: 9AM-8PM</h4>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 My Page. All rights reserved.</p>
  </footer>
</body>
</html>

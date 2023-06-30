<?php
  session_start();
  include('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Contact Page</title>
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
<body style="background-image: url(background.jfif)">
  <header>
    
      <img src="family 2.0.jfif" alt="">
      <h1 class="heading">Contact Us</h1>
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
  <main>
    <section >
      <h2 style="text-align: center;">KEEP IN TOUCH </h2>
          <p style="text-align: center;"> Lets keep in touch with us if you're interested to join our cooperative business . 
          Want to know our offer and discount, stay up do date and catch up with us !</p>
          <p style="text-align: center;"> Concact Us | +60133496201     |  liasyafikk99@gmail.com  | </p>
    </section>
    <br>

    <section>
      <h2 style="text-align: center;" > Contact Information </h2>
      <br>
      <h4 style="text-align: center;"> SHOP ORDER</h4> 
      <p style="text-align: center;"> *Contact Yaya*  | liasyafikk99@gmail.com | 123-456-789 |</p>
      <h4 style="text-align: center;"> WEEKEND MARKET & COLLABORATIONS </h4>
      <p style="text-align: center;"> *Contact Fatini* | fatinihd@gmail.com| 123-456-7890 |</p>
      <h4 style="text-align: center;"> EVENTS, FEASTS & WORKSHOPS</h4>
      <P style="text-align: center;"> *Contact Sherly* | sherlyzaini@gmail.com | 013-6245025 |</P>

  </main>

  <footer>
    <p>&copy; 2023 My Page. All rights reserved.</p>
  </footer>
</body>
</html>

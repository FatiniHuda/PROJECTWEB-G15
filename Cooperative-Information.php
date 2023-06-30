<?php
  session_start();
  include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooperative Information</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(109, 122, 52);
            margin: 0;
            background-repeat: no-repeat;
            background-size: cover;
            overflow-x: hidden;
            /* max-width: 100%; */
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

        img {
          width: 100%;
          height: 800px;
          position: relative;
        }
     
    .image-text {
        position: absolute;
        top: 40%;
        left: 50%;
        padding-right: 20px;
        color: #fff;
        padding: 20px;
        text-align: left;
        z-index: 1;
        color: #ffffff;
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 100px;
      }

      .box {
        background-color: #ffffff;
        padding-left: 0%;
        margin-left: 20%;
        /* margin-right: 105%; */
        padding-right: 1%;
        margin-top: -47%;
        width: 1000px; 
        justify-content: center;
        display: flex;
        min-height: 20vh;
        position: relative
      }
    

    .box .picture img{
      /* max-width: 50%; Adjust the maximum width of the image */
      height: auto; /* Maintain the image's aspect ratio */
    }

    .box .description{
      width: 50;
      text-align: right;
      padding-right:100px;
      padding-top: 35px;
      
    }

    .box .description h1{
      font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; ;
      color:  #344735;
    }

    .box .description h2{
      font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; ;
      color:  #344735;
    }

    .box .description p{
      font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; ;
      color:  #344735;
    }

    .img-text{
      width: 50px;
      text-align: left;
      padding-top: -100px;
    }
    .nav-bar-content{
            display: flex;
            height: 125.4px;
            font-size: 50px;
            color: white;
            justify-content: flex-start;
            align-items: center;
            margin-left: 06%;
            font-style: italic;
            width: 100%;
            
        }

        .nav-bar-list{
            display: flex;
            justify-content: center;
            background-color: #344735;
        }

        h1{
            font-size: 50px;
        }
        ul {
            display: flex;
            list-style-type: none;
            padding: 0;
            margin-top: 5px;
            margin-bottom: 5px;


        }
        li{
            margin-right: 10px;
            padding: 0;

        }
        a{
            text-decoration: none;
            color: white;
        }
        .nav-bar{
          background-color: #1c502d;
        }
        .title{
          font-size: 50px;
        }
        footer {
          margin-top: 20px;
        background-color: #1c502d;
        color: #fff;
        padding: 10px;
        text-align: center;
        }
        section{
          margin-top: 20px;
        }
    </style>
</head>
<body>
  <div class="container">
          <div class="nav-bar">
            <div class="nav-bar-content">
                <div class="title">
                    <h1>Cooperative Information</h1>
                </div>
            </div>
            <div class="nav-bar-list">
                <ul>
                    <li><a href="home-page.php">Home |</a></li>
                    <li><a href="Cooperative-Information.php">Cooperative Information |</a></li>
                    <li><a href="product.php"> Product |</a></li>
                    <li><a href="Contact.php">Contact |</a></li>
                    <li><a href="QRCode.php">QR Code |</a></li>
                    <?php echo generateInvoiceLink(); ?>
                    <?php echo generateNavigationLink(); ?>

                </ul>
            </div>
        </div>


    <div class="img" >
        <img src="image/mountainfarm.jpg" alt="Jap eh gambar tengah load" width="100%">
             <!-- <div class="image-text">
                  <p>Cooperative Information</p>
            </div> -->
    </div>
   
      </header>

    <div class="box">

        <div class="picture">
            <img src="image/atokyaya.jpg">
        </div>
            <div class="description">
            <h1>Abd Rahim bin Jais</h1>
            <p>Pengurusi Syarikat</p>
            <p>Phone: </p>
            <h2>0133496201</h2>
            <p>Email:</p>
            <h2>korperasihjjais@gmail.com</h2>
            <p>Address:</p>
            <h2>TL 113 , KAMPUNG PARIT HJ IDRIS, 84800, BUKIT GAMBIR, TANGKAK, JOHOR</h2>
            <p>Date of Birth:</p>
            <h2>January 26th, 1984</h2>
        </div>  

      </div>

          <h1 style="color:#ffffff; font-size: 54px; text-align: left; margin-top: 150px; font-size: 54px;
                    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans',
                      Arial, sans-serif; font-weight: 10000; text-align: center">
                      V  I  S  I  O  N   &amp;   M  I  S  I  O  N
          </h1>

  <div class="content">
  <p style="font-size: larger;text-align: left;color:#ffffff;font-family:'Trebuchet MS', 
          'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-weight: 10000;
           padding-top: 3%; padding-right: 3%; text-align: center">Our vision is to buy agricultural machinery to add agricultural produce to the cooperative. 
          In addition, to sell agricultural fertilizer to small farmers around the cooperative. 
          The mission of the Koperasi Keluarga Hj Jais Johor Berhad is to carry out advanced and competitive cooperative business activities that have a high impact and attract the target group of small farmers to buy their products.
          Besides that, to improve the ability and competence of the staff and members of the cooperative.</p>
  </div>

  <div>
    <h1 style=" color: #ffffff;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 
              'Lucida Grande', 'Lucida Sans', Arial, sans-serif; margin-top: 5%;font-size: 50px; text-align:center"
              >Koperasi Keluarga Hj Jais Johor Berhad Organization Structure </h1>
  </div>

  <div>
  <!-- blob:https://web.whatsapp.com/df5b0d86-0f63-4265-b687-3a826b82c0eb -->
  <img src="image/gambar-muka-cartaorganisasi.jpeg" alt="jap eh tengah load"  
    style="width: 800px; height: auto; 
    margin-left: 25%; 
    margin-top: 50px;
    border: 1px solid black; 
    border-radius: 5px; 
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
    justify-content: center;
    align-items: center;">
  </div>

  <div>
    <!-- blob:https://web.whatsapp.com/3f263806-4c16-4fbb-ac6a-6a26f7fe09ad -->
    <img src="image/gambar-biro-cartaorganisasi.jpeg" alt="jap eh tengah load" 
    style="width: 800px; height: auto; 
    margin-left: 25%; 
    margin-top: 50px;
    border: 1px solid black; 
    border-radius: 5px; 
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
    justify-content: center;
    align-items: center;">
  </div>
  <section>
          <br>
          <div class="footers" style="margin-bottom:10px">
            <h3 style="text-align: center;"> korporathjjais@gmail.com</h3>
          </div>
          <h4 style="text-align: center; background-color: #256d3d;">MON-FRI : 8AM-8PM</p>
          <p style="text-align: center; background-color: #256d3d;"> SATURDAY: 9AM-7PM</p>
          <P> SUNDAY: 9AM-8PM</h4>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 My Page. All rights reserved.</p>
  </footer>
  </div>
</body>
</html>

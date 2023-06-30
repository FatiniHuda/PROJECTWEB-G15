<?php
session_start();
include('db.php');
include('functions.php');
$numOfItems = checkCartNum();
// if (!isset($_SESSION['username'])) {
//   // User is not logged in, display a message to prompt them to login
//   echo "<script>alert('Please login to add items to the cart.');</script>";
// }
if(isset($_POST['submit']) && !isset($_SESSION['username'])){
  echo "<script>alert('Login or Signup to your account.');</script>";
  echo "<script>window.location.href = \"product.php\";</script>";
  exit();
}

if(isset($_POST['submit'])){
  if (!isset($_SESSION['username'])) {
    // User is not logged in, display a message to prompt them to login
    return;
  }

    $productID = $_POST['productId'];
    $userID = $_SESSION['userID'];
    $quantity = 1;
    $sql = "SELECT price FROM product_stock WHERE productId = '$productID'";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $price = $row['price'];

        // Check if the product already exists in the cart for the user
        $checkSql = "SELECT * FROM cart WHERE productID = '$productID' AND userID = '$userID'";
        $checkResult = mysqli_query($conn, $checkSql);
        if(mysqli_num_rows($checkResult) > 0) {
            // Product already exists in the cart, increment the quantity by 1
            $updateSql = "UPDATE cart SET quantity = quantity + 1, price = price + '$price' WHERE productID = '$productID' AND userID = '$userID'";
            if(mysqli_query($conn, $updateSql)) {
                echo "Quantity incremented successfully.";
            } else {
                echo "Error incrementing quantity: " . mysqli_error($conn);
            }
        } else {
            // Product does not exist in the cart, insert the data
            $insertSql = "INSERT INTO cart (productID, userID, quantity, price) VALUES ('$productID', '$userID', '$quantity', '$price')";
            if(mysqli_query($conn, $insertSql)) {
                echo "Data inserted into 'cart' table successfully.";
                $numOfItems = checkCartNum(); // Update the value of numOfItems
            } else {
                echo "Error inserting data into 'cart' table: " . mysqli_error($conn);
            }
        }

        header("Location: product.php");
        exit;
    } else {
        echo "No product found with the given productID.";
    }
}
  function checkCartNum() {
      if (isset($_SESSION["userID"])) {
          $userId = $_SESSION["userID"];
          $conn = mysqli_connect("localhost", "root", "", "projekweb");
          $select_row = mysqli_query($conn, "SELECT * FROM cart WHERE userId = '$userId'");
          $row_count = mysqli_num_rows($select_row);
          return $row_count;
      } else {
          return 0; // Return 0 if the "userId" key is not set in the session
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link rel="stylesheet" type="text/css" href="product.css">
    <style>
      .cart a{
        text-decoration: none;
        color: black;
      }

      .header{
        position: absolute;
        display: flex;
        justify-content: flex-start;
        font-size: 50px;
        background-color:#1c502d ;
      }

      body{
        background-color: rgb(109, 122, 52);
        overflow-x: hidden;
        color: white;
      }
      .image-with-text {
        width: 1700px; /* Adjust the width to accommodate the image and text */
        margin-left: 20px;
      }
      .product{
        /* border: 0.5px solid black; */
        /* text-align: center; */
      }
      .product img{
        
        outline: auto;
        /* text-align: center; */
      }
      .product-details{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        
      }
      input[type="submit"] {
        cursor: pointer;
        border-radius: 10px;
        width: 30%;
        height: 10%;
        font-size: 15px;
      }
      input[type="submit"]:hover {
        cursor: pointer;
        background-color: lightgrey;
      }
      .product:hover {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
      }



    </style>
</head>
<body>

  <nav style="margin-top:10px">
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
    

    <div class="header">
        <div class="header-title"> Shop Page </div>
      </div>
    
      <div class="image-with-text">
        <img src="image/petiksayur.jpg" alt="Your Image"> <!-- unsplash.com -->

        <div class="text-container">
          <h1>Fresh Organic Hj.Jais <br> Product.</h1>
          <h3>Free delivery straight to your door >></h3>
        </div>
      </div>

    <div class="cart">
      <a href="cart.php">
        <div class="cart-title">Shopping Cart</div>
        <div class="cart-items"><span><?php echo $numOfItems; ?></span> items in cart</div>
      </a>
    </div>

  <div class="product-wrapper">
      <div class="product">
            <form method="post" class="product-details">
                <img src="image/Palm Oil stock image_ Image of abstract, nature, seed - 20053691.jpg" alt="Product 1"> <!--dreamstime.com-->
                <div class="product-name">Palm Oil</div>
                <div class="product-price" style="color: white;">RM 499.99</div>
                <input type="hidden" name="productId" value="1">
                <?php if (!isset($_POST['submit'])): ?>
                    <input type="submit" name="submit" value="Add To Cart">
                <?php endif; ?>
            </form>
        </div>
    
      <div class="product">
        <form method="post" class="product-details">
          <img src="image/13 Vegetarian Jackfruit Recipes To Try.jpg" alt="Product 2">
          <div class="product-name">Nangka</div>
          <div class="product-price" style="color: white;">RM 24.99</div>
          <input type="hidden" name="productId" value="2">
          <?php if (!isset($_POST['submit'])): ?>
              <input type="submit" name="submit" value="Add To Cart">
          <?php endif; ?>
        </form>
      </div>

      <div class="product">
        <form method="post" class="product-details">
          <img src="image/How to Plant, Grow, and Harvest Banana Plants.jpg" alt="Product 3">
          <div class="product-name">Pisang</div>
          <div class="product-price" style="color: white;">RM 14.99</div>
          <input type="hidden" name="productId" value="3">
          <?php if (!isset($_POST['submit'])): ?>
              <input type="submit" name="submit" value="Add To Cart">
          <?php endif; ?>
        </form>
      </div>

      <div class="product">
        <form method="post" class="product-details">
          <img src="image/kelapa.jpg" alt="Product 4">
          <div class="product-name">Kelapa</div>
          <div class="product-price" style="color: white;">RM 29.99</div>
          <input type="hidden" name="productId" value="4">
          <?php if (!isset($_POST['submit'])): ?>
              <input type="submit" name="submit" value="Add To Cart" class="submit-btn">
          <?php endif; ?>
        </form>
      </div>

      <div class="product">
        <form method="post" class="product-details">
          <img src="image/Mangosteen Fruit Box.jpg" alt="Product 5">
          <div class="product-name">Manggis</div>
          <div class="product-price" style="color: white;">RM12.99</div>
          <input type="hidden" name="productId" value="5">
          <?php if (!isset($_POST['submit'])): ?>
              <input type="submit" name="submit" value="Add To Cart">
          <?php endif; ?>
        </form>
      </div>

      <div class="product">
        <form method="post" class="product-details">
          <img src="image/mufid-majnun-ML7MlOHKbGQ-unsplash.jpg" alt="Product 6">
          <div class="product-name">Durian</div>
          <div class="product-price" style="color: white;">RM 39.99</div>
          <input type="hidden" name="productId" value="6">
          <?php if (!isset($_POST['submit'])): ?>
              <input type="submit" name="submit" value="Add To Cart">
          <?php endif; ?>
        </form>
      </div>

      <div class="product">
        <form method="post" class="product-details">
          <img src="image/belanda.png" alt="Product 7">
          <div class="product-name">Durian Belanda</div>
          <div class="product-price" style="color: white;">RM 21.99</div>
          <input type="hidden" name="productId" value="7">
          <?php if (!isset($_POST['submit'])): ?>
              <input type="submit" name="submit" value="Add To Cart">
          <?php endif; ?>
        </form>
      </div>

      <div class="product">
        <form method="post" class="product-details">
          <img src="image/The Legend of Rambutan (Nephelium Lappaceum).jpg" alt="Product 8">
          <div class="product-name">Rambutan</div>
          <div class="product-price" style="color: white;">RM 17.99</div>
          <input type="hidden" name="productId" value="8">
          <?php if (!isset($_POST['submit'])): ?>
              <input type="submit" name="submit" value="Add To Cart">
          <?php endif; ?>
        </form>
      </div>

      <div class="product">
        <form method="post" class="product-details">
          <img src="image/WISErg Liquid Organic Fertilizer.jpg" alt="Product 9">
          <div class="product-name">Baja Tumbuhan</div>
          <div class="product-price" style="color: white;">RM 199.99</div>
          <input type="hidden" name="productId" value="9">
          <?php if (!isset($_POST['submit'])): ?>
              <input type="submit" name="submit" value="Add To Cart">
          <?php endif; ?>
        </form>
      </div>
  </div>
</form>
    </body>  
</body>
</html>
<?php
    session_start();
    include("db.php");
    include("functions.php");
    if(isset($_POST['submit'])){
        $userId = $_SESSION['userID'];
        $sql = "SELECT * FROM cart 
        WHERE userId = '$userId'";
        $result = mysqli_query($conn,$sql);

        if ($result->num_rows > 0){
            $orderId = rand(000000,99999);
            $_SESSION['orderId'] = $orderId;
            while ($row = $result->fetch_assoc()){
                $qty = $row['quantity'];
                $totalAmount = $row['price'];
                $productID = $row['productId'];
                $status = "PENDING";
            
                $sqlInsert = "INSERT INTO tblorder (orderId, userId, productID, quantity, totalamount, status)
                            VALUES ('$orderId', '$userId', '$productID', '$qty', '$totalAmount', '$status')";
                mysqli_query($conn,$sqlInsert);
            }
            $sqlDelete = "DELETE FROM cart WHERE userId = '$userId'";
            mysqli_query($conn, $sqlDelete);
            mysqli_close($conn);
            // 'view-invoice.php?invoiceid={$row['BillingId']}';
            header("Location: checkout.php?orderid={$orderId}");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- <link rel="stylesheet" type="text/css" href="product.css"> -->
    <style>
        .nav-bar-content{
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            background-color: #1c502d;
            color: white;
            font-style: italic;
        }
        body{
            background-color: rgb(109, 122, 52);
            color: white;
            font-family: Arial, sans-serif;
        }

        h1{
            margin-left: 20px;
            font-size: 50px;
            color: white;
        }

        .nav-bar-list{
            display: flex;
            justify-content: center;
            background-color: #344735;
        }

        h1{
            font-size: 40px;
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
        .table-cart {
        display: flex;
        justify-content: center;
        overflow-x: auto;
    }

    table {
        width: 100%;
        margin-top: 50px;
    }
    table,tr,td,th{
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;

    }

    th, td {
        padding: 10px;
    }

    th {
        background-color: #344735;
        color: white;
    }

    .table-cart td.image-cell {
        width: 150px;
        height: 150px;
    }

    .table-cart img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .submit-button{
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }
    input[type="submit"][name="submit"] {
        padding: 10px;
        border-radius: 20px;
        padding-left: 20px;
        padding-right: 20px;

    }
    input[type="submit"][name="submit"]:hover {
        background-color: lightgrey;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav-bar">
            <div class="nav-bar-content">
                <div class="title">
                    <h1>&lt;&lt;Cart Page&gt;&gt;</h1>
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
        <div class="table-cart">
            <table>
                <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php
                    $userId = $_SESSION['userID'];
                    
                    $sql = "SELECT ps.productId, ps.productName, ps.image_path, ps.price, c.quantity, c.cartId
                    FROM product_stock AS ps
                    JOIN cart AS c ON ps.productId = c.productId
                    WHERE c.userId = '$userId';";

                    $result = mysqli_query($conn,$sql);
                    $counter = 1;
                    $grandTotal = 0;

                    if($result->num_rows >0){
                        while($row = $result->fetch_assoc()){
                            $totalPrice = 0;
                            $totalPrice = $row['quantity'] * $row['price'];
                            $grandTotal = $grandTotal+$totalPrice;
                            echo "<tr>";
                            echo "<td>{$counter}</td>";
                            echo "<td>" . $row['productName'] . "</td>";
                            echo "<td class='image-cell'><img src='./image/" . $row['image_path'] . "' alt='Product Image' width='100%' height='100%'></td>";
                            echo "<td >" . $row['quantity'] . "</td>";
                            echo "<td>RM" . $totalPrice . "</td>";
                            echo "<td><button onclick='deleteRecord(" . $row['cartId'] . ")'>Delete</button></td>";
                            echo "</tr>";
                            $counter++;
                        }
                    }
                    $_SESSION['finalprice']  = $grandTotal;

                    echo "<tr>
                            <td colspan = '4'>Grand Total</td>
                            <td colspan='2'>RM {$grandTotal}</td>
                        </tr>";
                ?>
            </table>
            

        </div>
        <div class="submit-button">
                <form method="post">
                    <input type="submit" name="submit" value="Submit">
                </form>
        </div>
    </div>
</body>
<script>
    function deleteRecord(id) {
        if (confirm("Are you sure you want to delete this record?")) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    alert(xmlhttp.responseText);
                    location.reload(); // Reload the page after deletion
                }
            };
            xmlhttp.open("GET", "delete.php?id=" + id, true);
            xmlhttp.send();
        }
    }
    function goBack() {
        window.history.back();
    }
</script>
</html>
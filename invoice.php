<?php
    session_start();
    include("db.php");
    include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Orders</title>
    <!-- <link rel="stylesheet" type="text/css" href="product.css"> -->
    <style>
        .nav-bar-content{
            display: flex;
            justify-content: flex-start;
            /* margin-left: 20px; */
            align-items: flex-start;
            background-color: #1c502d;

        }

        .nav-bar-list{
            display: flex;
            justify-content: center;
            background-color: #344735;
        }

        h1{
            margin-left: 20px;
            font-size: 50px;
            color: white;
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
    td a{
        color: blue;
    }
    body{
        background-color: rgb(109, 122, 52);
        font-family: Arial, Helvetica, sans-serif;
        color: #fff;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav-bar">
            <div class="nav-bar-content">
                <div class="title">
                    <h1>Past Orders</h1>
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
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                    <?php
                    $userID = $_GET['userID'];
                        $sql = "SELECT DISTINCT orderID, PostingDate, status FROM tblorder WHERE userID = '$userID'";
                        $result  = mysqli_query($conn,$sql);
                        $counter = 1;
                        if($result->num_rows >0){
                            while($row = $result->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>{$counter}</td>";
                                echo "<td>" . $row['orderID'] . "</td>";
                                echo "<td >" . $row['PostingDate'] . "</td>";
                                echo "<td >" . $row['status'] . "</td>";
                                echo "<td><a href='view-invoice.php?orderID={$row['orderID']}'>View</a></td>";
                                echo "</tr>";
                                $counter++;
                            }
                        }
                    ?>
            </table>
        </div>
        <div class="submit-button">
                
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
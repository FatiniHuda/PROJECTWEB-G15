<?php

function generateNavigationLink() {
    if (!isset($_SESSION['username'])) {
        return '<li><a href="Login.php">Log In</a></li>';
    } else {
        return '<li><a href="Logout.php">Log Out</a></li>';
    }
    }
    
    function generateInvoiceLink(){
        if(isset($_SESSION['username'])){
            return '<li><a href="invoice.php?userID=' . $_SESSION['userID'] . '">Invoice |</a></li>';
        }
    }
?>
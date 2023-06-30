<?php
// Connect to the database
function deleteRecord(){
    $conn = mysqli_connect("localhost", "root", "", "projekweb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Check if the 'id' parameter exists and is valid
    if (isset($_GET['id']) ) {
        $id = $_GET['id'];
    
        // Delete the record from the database
        $sql = "DELETE FROM cart WHERE cartId = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    
    // $conn->close();
}
deleteRecord();

?>
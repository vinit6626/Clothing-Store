<?php
// Connect to the database
$conn = mysqli_connect("localhost:3307", "root", "", "solosquad_clothingstore");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the "id" parameter is present in the URL
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Prepare a DELETE statement
    $sql = "DELETE FROM Brands WHERE BrandID = $_GET["id"]";

    if ($conn->query($sql) === TRUE) {

        echo '<div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert"><h1 class="mb-0" style="text-align: center; color:green;">' . 'Successfully Updated' . '</h1></div>';
        header( "refresh:1.5;url=index.php" );

        } else {
            echo '<div class="danger">
            <span class="closebtn" onclick="closeAlert()" onclick="this.parentElement.style.display="none";">&times;</span> 
            <strong>Error!</strong> ' . $sql . '<br>' . $conn->error . '</div>';

            
        }
        $conn->close();
}
?>

// Close the database connection
mysqli_close($conn);
?>

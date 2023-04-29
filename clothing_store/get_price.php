<?php
$host="localhost:3307";
$username="root";
$pass="";
$db="solosquad_clothingstore";

$conn=mysqli_connect($host,$username,$pass,$db);

$itemId = $_GET["itemId"];

// Query the ClothingItems table to retrieve the price of the selected item
$query = "SELECT Price FROM ClothingItems WHERE ItemID = $itemId";
$result = mysqli_query($conn, $query);

// Retrieve the price from the query result set
if ($row = mysqli_fetch_assoc($result)) {
    $price = $row["Price"];
} else {
    $price = "";
}

// Return the price as a response to the XMLHttpRequest
echo $price;
?>


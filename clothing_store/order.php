<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clothing Store</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="icon" href="./favicon/favicon.png" type="image/x-icon">

  <style>
    .container{
        margin-top: 80px;
        
    }
    /* Style for the footer */
    .footer {
      background-color: #f5f5f5;
      padding: 30px 0;
      margin-top: 60px;
    }

    .alert {
        padding: 20px;
        background-color: green; 
        color: white;
        margin-bottom: 15px;
    }

    .danger {
    padding: 20px;
    background-color: red; 
    color: white;
    margin-bottom: 15px;
    }

    /* The close button */
    .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
    }

    /* When moving the mouse over the close button */
    .closebtn:hover {
    color: black;
    }
    .table-responsive{
        width:80%;
        margin:auto;
        border: 1px solid black;
    }
    
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="./index.php">Clothing Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Brands</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./store.php">Stores</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./clothingitem.php">Clothing Items</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./order.php">Order<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./pdf.php">PDF</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect form data
    $UserName = $_POST['UserName'];
    $Address = $_POST['Address'];
    $ItemID = $_POST['ItemID'];
    $Price = $_POST['Price'];
    // validate form data
    $errors = array();
    if (empty($UserName)) {
        $errors[] = "User name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $UserName)) {
        $errors[] = "User name is not allowed, Enter valid brand name.";
    }
    if (empty($Address)) {
        $errors[] = "Address is required.";
    } 
    if (empty($ItemID)) {
        $errors[] = "Select clothing item.";
    }  
    if (!empty($errors)) {
        echo '<div id="error-alert" class="danger alert-danger alert-dismissible fade show" role="alert">';
        foreach ($errors as $error) {
            echo '<p class="mb-0">' . $error . '</p>';
        }
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()">
        </button></div>';
    }else {
        // connect to database
        $host="localhost:3307";
        $username="root";
        $pass="";
        $db="solosquad_clothingstore";
        
        $conn=mysqli_connect($host,$username,$pass,$db);
        if(!$conn){
            die("Database connection error");
        }
                
        // insert form data into database
        $sql = "INSERT INTO OrderDetails (UserName, Address, ItemID, Total) VALUES ('$UserName', '$Address', '$ItemID', '$Price' )";
        
        if ($conn->query($sql) === TRUE) {

        echo '<div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert"><p class="mb-0">' . 'Successfully data added into database' . '</p><button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()">
         
        </button></div>';

        } else {
            echo '<div class="danger">
            <span class="closebtn" onclick="closeAlert()" onclick="this.parentElement.style.display="none";">&times;</span> 
            <strong>Error!</strong> ' . $sql . '<br>' . $conn->error . '</div>';

            
        }
        
        // close database connection
        $conn->close();
    }
}
?>

    <div class="container">
  <h1 class="text-center">Order Now</h1>
  <div class="row justify-content-center">
    <div class="col-md-6">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="name">Enter Your Name:</label>
                <input type="text" class="form-control" id="UserName" name="UserName" placeholder="Vinit Dabhi">
            </div>
            <div class="form-group">
                <label for="name">Enter Your Address:</label>
                <input type="text" class="form-control" id="Address" name="Address" placeholder="123 Abc Kitchener ON N2C 1A2">
            </div>

            <div class="form-group">
                <label for="store">Select Clothing Item:</label>
                <select class="form-control" id="ItemID" name="ItemID" onchange="updatePrice()">
                    <?php
                        $host="localhost:3307";
                        $username="root";
                        $pass="";
                        $db="solosquad_clothingstore";

                        $conn=mysqli_connect($host,$username,$pass,$db);
                        // Query the store table
                        $query = "SELECT * FROM ClothingItems";
                        $result = mysqli_query($conn, $query);

                        // Iterate over the query result set and create HTML options
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row["ItemID"] . "'>" . $row["ItemName"] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Category">Price:</label>
                <input type="text" class="form-control" id="Price" name="Price" placeholder="129.99" readonly>
            </div>        
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>  
        </form>

    </div>
  </div>
</div>


<?php
    // Connect to the database
    $conn = mysqli_connect("localhost:3307", "root", "", "solosquad_clothingstore");

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
  
    // Select data from Brands table
    $data = "SELECT * FROM ClothingItems INNER JOIN Brands ON ClothingItems.BrandID = Brands.BrandID INNER JOIN Stores ON ClothingItems.StoreID = Stores.StoreID ORDER BY ItemID DESC";
    $result = mysqli_query($conn, $data);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Output the table headers
        echo "
        <div class='table-responsive'>
        <h3 class='text-center'>List of Products That We Offer</h3>
        <table class='table'>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Brand Name</th>
                      <th>Store Name</th>
                    </tr>
                  </thead>
                  <tbody>";
      
        // Output the table rows with data from the database
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>" . $row["ItemName"] . "</td>
                  <td>" . $row["ItemDescription"] . "</td>
                  <td>" ."$ ". $row["Price"] . "</td>
                  <td>" . $row["BrandName"] . "</td>
                  <td>" . $row["StoreName"] . "</td>
                </tr>";
        }
      
        // Output the table closing tags
        echo "</tbody></table></div>";
      } else {
        // Output a message if no rows were returned
        echo "No results found.";
      }
      

    // Close the database connection
    mysqli_close($conn);
?>
  <footer class="footer">
    <div class="text-center">
      <span>&copy; 2023 Clothing Store</span>
    </div>
  </footer>
  <!-- Bootstrap scripts (jQuery and Popper.js are required for Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSbNt0" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    function updatePrice() {
        var itemId = document.getElementById("ItemID").value;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_price.php?itemId=" + itemId, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                document.getElementById("Price").value = xhr.responseText;
            }
        };
        xhr.send();
    }
</script>

</body>
</html>

<?php
// Connect to the database
$conn = mysqli_connect("localhost:3307", "root", "", "solosquad_clothingstore");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $id = $_POST["id"];
    $name = $_POST["BrandName"];
    $desc = $_POST["BrandDescription"];
    $cat = $_POST["BrandCategory"];
    $errors = array();
    if (empty($name)) {
        $errors[] = "Brand name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "Brand name is not allowed, Enter valid brand name.";
    }
    
    if (empty($desc)) {
        $errors[] = "Brand Description is required.";
    } 
    if (empty($cat)) {
        $errors[] = "Brand Category is required.";
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
   
        // Update the record in the database
        $sql = "UPDATE Brands SET BrandName='$name', BrandDescription='$desc', BrandCategory='$cat' WHERE BrandID='$id'";
        
        if ($conn->query($sql) === TRUE) {

        echo '<div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert"><h1 class="mb-0" style="text-align: center; color:green;">' . 'Successfully Updated' . '</h1></div>';
        header( "refresh:1.5;url=index.php" );

        } else {
            echo '<div class="danger">
            <span class="closebtn" onclick="closeAlert()" onclick="this.parentElement.style.display="none";">&times;</span> 
            <strong>Error!</strong> ' . $sql . '<br>' . $conn->error . '</div>';

            
        }
        
        // close database connection
        $conn->close();
    }
}

// Check if the ID parameter is set in the URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Select the record with the matching ID from the database
    $sql = "SELECT * FROM Brands WHERE BrandID='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Fetch the record data and store it in variables
        $row = mysqli_fetch_assoc($result);
        $name = $row["BrandName"];
        $desc = $row["BrandDescription"];
        $cat = $row["BrandCategory"];
    } else {
        echo "No matching records found";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clothing Store</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">Brands<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./store.php">Stores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./clothingitem.php">Clothing Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./order.php">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./pdf.php">PDF</a>
                </li>
            </ul>
        </div>
    </nav>
<!-- Display the form with the record data -->
<div class="container">
    <h1 class="text-center">Update Brand</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="name">Brand Name:</label>
                    <input type="text" class="form-control" id="BrandName" name="BrandName" placeholder="Puma" value="<?php echo $name ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Brand Description:</label>
                    <input type="text" class="form-control" id="BrandDescription" name="BrandDescription" placeholder="Sportswear Brand" value="<?php echo $desc ?>">
                </div>
                <div class="form-group">
                    <label for="Category">Brand Category:</label>
                    <input type="text" class="form-control" id="BrandCategory" name="BrandCategory" placeholder="Fashion" value="<?php echo $cat ?>">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="text-center">
      <span>&copy; 2023 Clothing Store</span>
    </div>
  </footer>
  <!-- Bootstrap scripts (jQuery and Popper.js are required for Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSbNt0" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

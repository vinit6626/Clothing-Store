
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
                <li class="nav-item ">
                    <a class="nav-link" href="./index.php">Brands</a>
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
                <li class="nav-item active">
                    <a class="nav-link" href="./pdf.php">PDF<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container">
  <h1 class="text-center" id="text">PDF Generator</h1>
  <div class="row justify-content-center">
    <div class="col-md-6 text-center py-4">
        <div class="form-group py-4">
            <form method="post" action="./avg_spent.php" target="_blank">
                <button type="submit" class="btn btn-success" id="text1">Click Here to Get Average Spent Amount On Shopping</button>
            </form>
        </div>
        <div class="form-group py-4">
            <form method="post" action="./brand_popularity.php" target="_blank">
                <button type="submit" class="btn btn-success">Click Here to Get Brands Popularity in Our System</button>
            </form>
        </div>
        <div class="form-group py-4" style="margin-bottom:90px">
            <form method="post" action="./top_users.php" target="_blank">
                <button type="submit" class="btn btn-success">Click Here to Get Top 3 User With Maximum Order</button>
            </form>
        </div>
        <div class="container text-center">
        <h3>Font Size Change</h3>
            <button onclick="increaseFontSize()" class="btn btn-primary">+</button>
            <button onclick="decreaseFontSize()" class="btn btn-primary">-</button>
        </div>
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
  <script>
    function increaseFontSize() {
    var text = document.getElementById("text");
    var style = window.getComputedStyle(text, null).getPropertyValue('font-size');
    var currentSize = parseFloat(style);
    text.style.fontSize = (currentSize + 2) + 'px';
}   

function decreaseFontSize() {
    var text = document.getElementById("text");
    var style = window.getComputedStyle(text, null).getPropertyValue('font-size');
    var currentSize = parseFloat(style);
    text.style.fontSize = (currentSize - 2) + 'px';
}   
</script>

</body>
</html>

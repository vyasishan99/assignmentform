<?php
error_reporting(0);
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "addtocart"; 

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch products from the database
$select = "SELECT * FROM tbl_product";
$result = $con->query($select);

// Check if query executed successfully
if ($result === false) {
    echo "Error executing query: " . $con->error;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Products</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        function updateTotal(qty, price, id) {
            var total = qty * price;
            document.getElementById("total-" + id).innerText = total;
        }
    </script>
</head>
<body>

<h3 align="center">Shopping Cart</h3>
<div class="container">
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                <img src="/php-1130mwf/module5/add-to-cart/assets/upload/<?php echo $row["image"];?>" class="card-img-top" alt="<?php echo $row["name"];?>" style="height: 200px; object-fit: cover;">


                   
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $row["name"];?></h5>
                        <p class="card-text">Price: Rs-<?php echo $row["price"];?></p>
                        <form method="post" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $row['id'];?>">
                            <input type="hidden" name="product_name" value="<?php echo $row['name'];?>">
                            <input type="hidden" name="product_price" value="<?php echo $row['price'];?>">
                            Quantity: <input type="number" name="quantity" min="1" max="10" value="1" onchange="updateTotal(this.value, <?php echo $row['price'];?>, <?php echo $row['id'];?>)"><br>
                            Subtotal Rs. <label id="total-<?php echo $row['id'];?>"><?php echo $row["price"];?></label><br>
                            <button type="submit" name="add_to_cart" class="btn btn-dark mt-2">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
            }
        } else {
            echo "<div class='col-12'><p>No products available.</p></div>";
        }
        ?>
    </div>
</div>
</body>
</html>

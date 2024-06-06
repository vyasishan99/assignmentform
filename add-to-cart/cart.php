<?php
require_once("model/model.php");

$model = new Model();

// Handle removal of item from cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_item'])) {
    $cart_id = $_POST["cart_id"];
    $deleted = $model->deleteCartItem($cart_id);
    if ($deleted) {
        echo "<script>alert('Item removed from cart successfully');</script>";
        // Redirect to prevent resubmission of form data
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<script>alert('Failed to remove item from cart');</script>";
    }
}

// Handle adding item to cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $price = $_POST["product_price"];
    $quantity = $_POST["quantity"];
    $total = $price * $quantity;
    $data = array(
        "product_id" => $product_id,
        "cart_name" => $product_name,
        "price" => $price,
        "qty" => $quantity,
        "total" => $total
    );
    $inserted = $model->insertalldata('tbl_cart', $data);
    if ($inserted) {
        echo "<script>alert('Item added to cart successfully');</script>";
    } else {
        echo "<script>alert('Failed to add item to cart');</script>";
    }
}

// Fetch cart items from the database
$select = "SELECT * FROM tbl_cart";
$result = $model->con->query($select);
$totalPrice = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Shopping Cart</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    <script>
        function confirmRemove(cartId) {
            if (confirm('Are you sure you want to remove this item from the cart?')) {
                document.getElementById('removeForm_' + cartId).submit();
            }
        }
    </script>
</head>
<body>

<h2 align="center">Shopping Cart</h2>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $totalPrice += $row['total'];
                    ?>
                            <tr>
                                <td><?php echo $row['cart_id']; ?></td>
                                <td><?php echo $row['cart_name']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['qty']; ?></td>
                                <td><?php echo $row['total']; ?></td>
                                <td>
                                    <form id="removeForm_<?php echo $row['cart_id']; ?>" method="post" action="">
                                        <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                                        <button type="button" class="btn btn-danger" onclick="confirmRemove(<?php echo $row['cart_id']; ?>)">Remove</button>
                                        <input type="hidden" name="remove_item" value="true">
                                    </form>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="6">No items in the cart</td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td colspan="3"></td>
                        <td>Total Price</td>
                        <td><?php echo $totalPrice; ?></td>
                        <td><button class="btn btn-warning">Clear</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

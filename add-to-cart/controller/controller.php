<?php

require_once("model/model.php");

class Controller extends Model {
    public function __construct() {
        parent::__construct();

        if (isset($_POST['submit'])) {
            // Form data handling for adding product
            $tmp_name = $_FILES["assets"]["tmp_name"];
            $imgname = $_FILES["assets"]["name"];
            $path = "./assets/upload/" . $imgname;
            $type = $_FILES["assets"]["type"];
            $size = $_FILES["assets"]["size"] / 1024;

            if (move_uploaded_file($tmp_name, $path)) {
                $name = $_POST["name"];
                $price = $_POST["price"];
                $qty = $_POST["qty"];
                $data = array("image" => $imgname, "name" => $name, "price" => $price, "qty" => $qty);

                // Insert product data into database
                $chk = $this->insertalldata('tbl_product', $data);

                if ($chk) {
                    echo "<script>
                        alert('Your product added successfully')
                        window.location='./';
                        </script>";
                } else {
                    echo "<script>
                        alert('Failed to add product')
                        </script>";
                }
            } else {
                echo "<script>
                    alert('Failed to upload image')
                    </script>";
            }
        } elseif (isset($_POST['add_to_cart'])) {
            // Form data handling for adding to cart
            $product_id = $_POST["product_id"]; // Fetch product ID from form
            $cart_name = $_POST["product_name"];
            $price = $_POST["product_price"];
            $quantity = $_POST["quantity"];
            $total = $price * $quantity;
            
            // Ensure product_id is included in data array
            $data = array("product_id" => $product_id, "cart_name" => $cart_name, "price" => $price, "qty" => $quantity, "total" => $total);

            // Insert cart data into database
            $chk = $this->insertalldata('tbl_cart', $data);

            if ($chk) {
                echo "<script>
                    alert('Item added to cart successfully')
                    window.location='./cart';
                    </script>";
            } else {
                echo "<script>
                    alert('Failed to add item to cart')
                    </script>";
            }
        }

        if (isset($_SERVER["PATH_INFO"])) {
            // Routing based on PATH_INFO
            switch ($_SERVER["PATH_INFO"]) {
                case '/':
                    require_once("index.php");
                    require_once("navbar.php");
                    require_once("content.php");
                    break;

                case '/cart':
                    require_once("index.php");
                    require_once("navbar.php");
                    require_once("cart.php");
                    break;

                case '/content':
                    require_once("index.php");
                    require_once("navbar.php");
                    require_once("content.php");
                    break;

                default:
                    require_once("index.php");
                    require_once("navbar.php");
                    require_once("404.php");
                    break;
            }
        }
    }
}

$obj = new Controller();
?>

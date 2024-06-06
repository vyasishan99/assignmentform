<?php
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

// Initialize with an array containing the total count
$totalcount = array(array("total" => 0));
$mainurl = "http://localhost/php-1130mwf/module5/add-to-cart/";
$baseurl = "http://localhost/php-1130mwf/module5/add-to-cart/assets";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Validate and sanitize form data
    $name = $con->real_escape_string($_POST['name']);
    $price = $con->real_escape_string($_POST['price']);
    
    $image = $_FILES['image']['name'];
    $target_dir = "assets/";
    $target_file = $target_dir . basename($image);

        // Upload image
       if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file))
         {
      // Prepare and bind
     $stmt = $con->prepare("INSERT INTO tbl_product (name, price,  image) VALUES (?, ?, ?)");
     $stmt->bind_param("sss", $name, $price,  $target_file); // Adjusted "sss" for three string variables;
    
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        

        // Close the statement
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Close the connection
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MVC APP</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="<?php echo $baseurl;?>/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MVC APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav p-3 m-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $mainurl;?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#productmodal">Add To Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $mainurl;?>cart">Add Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $mainurl; ?>">
                            <span class="bi bi-cart"></span>
                            <?php
                            require_once("model/model.php");

                            $model = new Model();

                            $total_count = $model->selectcount('tbl_cart', 'cart_id');

                            echo '<span class="badge badge-sm bg-danger">' . $total_count[0]["total"] . '</span>';
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="productmodal" aria-labelledby="productmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Enter Product Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="label-group">Select Image</label>
                                <input type="file" name="image" class="input-group" required><br><br>
                            </div>
                            <div class="input-group">
                                <label>Name</label>
                                <input type="text" name="name" class="input-group" required><br><br>
                            </div>
                            <div class="input-group">
                                <label>Price</label>
                                <input type="text" name="price" class="input-group" required><br><br>
                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>










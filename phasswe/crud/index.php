<?php
require_once("config.php");

// edit data
if(isset($_GET["edid"]))
{
    $edid = $_GET["edid"];
    $select = "select * from tbl_data where id='$edid'";
    $query = mysqli_query($con, $select);
    $fetch1 = mysqli_fetch_array($query);
 echo $fetch1["name"];
}

// update data
if(isset($_POST["upd-data"]))
{
    date_default_timezone_set("Asia/Calcutta");
    $edid = $_GET["edid"];
    $nm = $_POST["data"];
    $date = date("d/m/Y H:i:s a");
    $upd = "update tbl_data set name='$nm', added_date_time='$date' where id='$edid'";
    $query = mysqli_query($con, $upd);
    if($query)
    {
        echo "<script>
        alert('Your data updated successfully')
        window.location='index.php';
        </script>";
    }
}


// delete a data
if(isset($_GET["delid"]))
{
    $delid = $_GET["delid"];
    $del = "delete from tbl_data where id='$delid'";
    $query = mysqli_query($con, $del);
    if($query)
    {
        echo "<script>
        alert('Your data deleted successfully')
        window.location='index.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- bootstrap -->
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- data tables css file -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <!-- bootstrap js file -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJsrc=95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- data tables js file -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            new DataTable('#example');
        })
    </script>
</head>
<body>
    <!-- add data -->
    <section id="crud-app">
        <h2>CRUD Operation</h2>
        <hr class="border border-1 border-danger w-25">
        <?php
        if(!isset($_GET["edid"]))
        {
        ?>
        <form action="insert-data.php" method="post">
            <div class="input-group">
                <input type="text" name="data" placeholder="Enter any name" class="form-control">
                <input type="submit" name="add-data" value="Submit" class="btn btn-lg btn-danger">
            </div>
        </form>
        <?php
        }
        else
        {
        ?>
        <h4 class="text-success">Edit data</h4>
        <form method="post">
            <div class="input-group">
                <input type="text" name="data" value="<?php echo $fetch1["name"];?>" placeholder="Enter any name" class="form-control">
                <input type="submit" name="upd-data" value="Update" class="btn btn-lg btn-danger">
            </div>
        </form>
        <?php
        }
        ?>
    </section>
    <!-- manage app data -->
    <section id="manage-app" class="bg-white p-2 mt-5">
        <h3>Manage Data</h3>
        <hr class="border border-1 w-50 border-danger">
        <table id="example" align="center" class="table table-responsive table-bordered" width="100%" cellspacing="3" cellpadding="3">
            <thead>
                <tr align="center">
                    <th>Id</th>
                    <th>Name *</th>
                    <th>Date *</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- display the data -->
            <tbody>
                <?php
                require_once("config.php");
               // $select = "select * from tbl_data order by name asc";
                $select = "select * from tbl_data order by id asc";

                $query = mysqli_query($con, $select);
                while($fetch = mysqli_fetch_array($query))
                {
                ?>
                <tr align="center">
                    <td><?php echo $fetch["id"];?></td>
                    <td><?php echo $fetch["name"];?></td>
                    <td><?php echo $fetch["added_date_time"];?></td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#del"><i class="bi bi-trash"></i></a>
                        <a href="index.php?edid=<?php echo $fetch['id'];?>" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i></a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
    <!-- generate a model confirmations for deleted data -->
    <div class="modal fade" id="del" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content p-5">
                <h3 class="text-center text-danger">Are you sure to Delete data?</h3>
                <h4 align="center" class="mt-5">
                    
                      <?php
                      $select="select * from tbl_data order by id asc";
                      $query=mysqli_query($con,$select);
                      $fetch1=mysqli_fetch_array($query);
                      ?>
                    <a href="index.php?delid=<?php echo $fetch1['id'];?>">
                    <button type="button" class="btn btn-sm btn-success">OK</button></a>&nbsp;&nbsp
                    
                    
                    
                    
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancel</button></a>
                
            </div>
        </div>
    </div>
</body>
</html>



      
 
 

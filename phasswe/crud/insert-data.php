<?php
require_once("config.php");
if(isset($_POST["add-data"]))
{
    date_default_timezone_set("Asia/Calcutta");
    $data=$_POST["data"];
    $date_time=date("d/m/Y H:i:s a");
    $insert="insert into tbl_data(name,added_date_time) values('$data','$date_time')";
    $query=mysqli_query($con,$insert);
    if($query)
    {
        echo "<script>
        alert('Thanks for adding data')
        window.location='index.php';
        </script>";
    }

}



?>
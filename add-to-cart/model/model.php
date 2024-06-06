<?php
class Model 
{
    public $con = "";

    public function __construct()
    {
        // database connection
        try {
            $this->con = new mysqli("localhost", "root", "", "addtocart");
            if ($this->con->connect_error) {
                die("Connection failed: " . $this->con->connect_error);
            }
            // Commenting out the echo statement to prevent unintended output
            // echo "connected successfully";
        } catch (Exception $e) {
            die(mysqli_error($this->con));
        }
    }

    // create a member function for join tables
    public function joindata($table, $table1, $column, $id)
    {
        $arr = array();
        $select = "SELECT * FROM $table JOIN $table1 ON $column = '$id'";
        $query = mysqli_query($this->con, $select);
        while ($fetch = mysqli_fetch_array($query)) {
            $arr[] = $fetch;
        }
        return $arr;
    }

    public function selectcount($table, $column)
    {
        $arr = array();
        $select = "SELECT count($column) as total FROM $table";
        $query = mysqli_query($this->con, $select);
        while ($fetch = mysqli_fetch_array($query)) {
            $arr[] = $fetch;
        }
        return $arr;
    }

    public function selectsubtotal($table, $column, $column1)
    {
        $arr = array();
        $select = "SELECT sum($column) as total FROM $table WHERE $column1";
        $query = mysqli_query($this->con, $select);
        while ($fetch = mysqli_fetch_array($query)) {
            $arr[] = $fetch;
        }
        return $arr;
    }

    // create a member function for insert all data
    public function insertalldata($table, $data)
    {
        $key = array_keys($data);
        $key1 = implode(',', $key);

        $value = array_values($data);
        $value1 = implode("','", $value);

        $insert = "INSERT INTO $table ($key1) VALUES ('$value1')";
        // Debugging: print the query
        // echo $insert; 

        $query = mysqli_query($this->con, $insert);
        if (!$query) {
            die("Error: " . mysqli_error($this->con));
        }

        return $query;
    }

    public function selectalldata($table)
    {
        $arr = array();
        $select = "SELECT * FROM $table";
        $query = mysqli_query($this->con, $select);
        while ($fetch = mysqli_fetch_array($query)) {
            $arr[] = $fetch;
        }
        return $arr;
    }
   
    // create a member function to delete cart item
    public function deleteCartItem($cart_id) {
        $stmt = $this->con->prepare("DELETE FROM tbl_cart WHERE cart_id = ?");
        $stmt->bind_param("i", $cart_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>

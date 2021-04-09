<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "basic-banking-system";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        die("Error: ".$mysqli_connect_error());
    }

    function fetch_current_balance($id) {

        $sql = "SELECT * from `customers` WHERE `cust_id`= $id";
        $result = $GLOBALS['conn']->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $current_balance = $row['current_balance'];
                }
            }
            return $current_balance;
        }

?>
<?php 
    include("bootstrap.php"); 
    include("dbconnect.php");
    
    $id = 22631;
    $sql = "SELECT `cust_name`,`transaction_id`,`amount`,`date` from `transactions`,`customers` 
            WHERE `sender_id`= $id AND `cust_id` = `receiver_id` ORDER BY `transaction_id`";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
</head>
<body onload="loading('container')">

     <div id="container" style="display:none">

        <div class="header">

                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>&nbsp menu
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index.php">Home</a>
                        <a class="dropdown-item" href="transactionList.php">Transaction History</a>
                        <a class="dropdown-item" href="memberList.php">Customers</a>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </div>

                <h1>Transaction History</h1>
        </div>

        <div class="list">
            <table class='table table-striped animate-bottom'>
                <th>Sno.</th> <th>Recepeints Name</th> <th>Amount</th> <th>Transaction id</th> <th>Date</th>

                <?php

                    if ($result->num_rows > 0) {
                        $sno = 1;
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$sno."<td>". $row["cust_name"]."</td><td>". $row["amount"]."</td><td>". $row["transaction_id"]."</td><td>".$row["date"]."</td>";
                            $sno++;

                        }
                    }else {
                        echo "<h3>No Transactions</h3>";
                        }
                ?>
            </table>
        
        </div>

    </div>

</body>
</html>

<style>

    #container{
        margin:0;
        text-align:center;
    }

    .header{
        text-align:center;
        margin:0;
        padding:50px;
        background-color:#212529;
        color:white;
        width:100%;
    }

    .dropdown{
        display: flex;
        align-self: flex-start;
    }

    .dropdown-item{
        width:100%;
        margin:1px;
        border-bottom: 1px solid black;
    }

    .dropdown-item:hover{
        background-color: lightgrey;
    }

    h1{
        font-family:initial;
        margin:50px;
        font-size:60px;
    }

    h3{
        margin:20px;
    }

    .table{
        text-align:center;
        margin-top:0;
    }

</style>
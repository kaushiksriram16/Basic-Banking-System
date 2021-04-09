<?php
    include("bootstrap.php");
    include("dbconnect.php");
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members-list</title>
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

            <h1>Transfer to</h1>
         </div>

        <div class="member-list">

                <?php
                    echo "<table class='table  table-striped table-bordered table-responsive-sm animate-bottom'>
                          <tr><th>Sno.</th> <th>Name</th> <th>Transfer</th></tr>";
                        $sno = 1;
                        $sql = "SELECT * FROM customers WHERE `cust_name` !='Kaushik Sriram'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {

                                echo "<tr><td>".$sno."<td>". $row["cust_name"]."</td>"."<td> <a href='transfer.php?cust_name=".$row['cust_name']."&cust_id=".$row['cust_id']."&current_balance=".$row['current_balance']."' class='btn btn-success'> Transfer money to ".$row["cust_name"]."</a><br>";
                                $sno++;

                            }
                        } else {
                            echo "0 results";
                        }
                        echo"</table>";
                ?>
            </table>
        </div>
        
    </div>
        
    </body>
</html>

<style>

    body{
        background-color:whitesmoke;
        overflow-x: hidden;
    }

    h1,h2{
        font-family:initial;
        margin:50px;
        font-size:60px;

    }

    .header{
        text-align:center;
        margin:0;
        padding:50px;
        background-color:#212529;
        color:white;
        width:100%;
    }

    table{
        margin: 10px;
        text-align:center;
        font-family: initial;
        font-size:larger;
    }

    table .btn{
        width: 50%;
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
</style>
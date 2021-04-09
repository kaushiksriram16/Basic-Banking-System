<?php 
    include("bootstrap.php");
    include("dbconnect.php");

    $current_balance = fetch_current_balance(22631);
?>      

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
    <body onload=" typeWriter(); loading('content') ">

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

            <h1><b id="type-text"></b></h1>
        </div> 

        <div class="dashboard animate-bottom">
             <h2>Welcome KAUSHIK SRIRAM ! </h2><br>
             <h3>Current Balance: ₹ <?php echo $current_balance;?> </h3>
        </div>

        <div id="content" class="content" style="display:none;" >
            <a href="memberList.php" class="btn btn-primary animate-bottom">view members</a>
            <a href="transactionList.php" class="btn btn-primary animate-bottom">your transactions</a>
        </div>   
    </body>
</html>

<style>

    body{
        text-align:center;
        background-color: whitesmoke
    }

    h1{
        font-family:initial;
        margin:100px;
        font-size:60px;
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

    .header{
        text-align:center;
        margin:0;
        padding:40px;
        background-color:#212529;
        color:white;
        width:100%;
    }

    a{
      width: 60%;
      padding:50px;
      margin:20px;
      display:block;
    }

  
    .dashboard{
        text-align:left;
        font-family: 'Kiwi Maru', serif;
        width:100%;
        background-color:rgb(100, 99, 99);
        padding:40px;
        color:white;
    }

    .content{
        padding:30px 0 100px 0;
    }

</style>


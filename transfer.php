<?php
    include("bootstrap.php");
    include("dbconnect.php");

    $receiver_id = $_GET['cust_id'];
    $receiver_name = $_GET['cust_name'];
    $sender_id = 22631;
    $date = date_default_timezone_set('Asia/Kolkata');
    $date = strval(date("Y-m-d H:i:s"));

    $scurrent_balance = fetch_current_balance($sender_id);
    $rcurrent_balance = fetch_current_balance($receiver_id);

    if(isset($_GET["cancel"])&&$_GET["cancel"]==1){
        echo"
            <script>
                Swal.fire({
                    title: '<strong>Are you sure you want to cancel payment?</strong>',
                    icon: 'question',
                    showCloseButton: false,
                    showCancelButton: true,
                    focusConfirm: false,
                    
                    cancelButtonText: `No`,
                    confirmButtonText: `Yes`,
                    backdrop: `grey`,
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = `index.php`;
                          }
                        })
            </script>
        ";
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $amount = $_POST["amount"];

        if($amount<=0){
            echo "
                <script>
                    Swal.fire({
                        title: 'Enter the valid amount!',
                        text: '',
                        icon: 'error',
                        }); 
                </script>      
                ";
        }elseif ($amount>$scurrent_balance) {
            echo "
                <script>
                    Swal.fire({
                        title: 'Payment failed!',
                        text: 'Insufficient Funds (Current Balance: ₹ $scurrent_balance)',
                        icon: 'error',
                        }); 
                </script>      
                ";
        }else{
           
           $sql1 = "INSERT INTO `transactions` (`date`, `sender_id`, `receiver_id`, `amount`) VALUES ('$date', $sender_id, $receiver_id, $amount)";
           $sql2 = "UPDATE `customers` SET `current_balance`= $rcurrent_balance+$amount WHERE `cust_id` = $receiver_id";
           $sql3 = "UPDATE `customers` SET `current_balance`= $scurrent_balance-$amount WHERE `cust_id` = $sender_id";

           $result1 = $conn->query($sql1);
           $result2 = $conn->query($sql2);
           $result3 = $conn->query($sql3);
       
        if($result1 && $result2 && $result3){
                echo "
                        <script>
                            Swal.fire({
                                    title: 'Success!',
                                    html: 'Transfered ₹$amount to $receiver_name',
                                    icon: 'success',
                                    showConfirmButton: true,
                                    showCancelButton: true,
                                    confirmButtonText: `See transaction history`,
                                    cancelButtonText: 'Go to Home page',
                                    backdrop: `grey`,
                                    }).then((result) => {
                                    if (result.value) {
                                        window.location.href = `transactionList.php`;
                                    }else{
                                        window.location.href = `index.php`;
                                    }
                                    });
                        </script>
                    ";
            }else{
               echo "
                <script>
                    Swal.fire({
                        title: 'Something went wrong!!',
                        text: '',
                        icon: 'error',
                        }); 
                </script>      
                ";
           }           
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tranferring</title>
</head>
<body onload="loading('container')">
    <div id="container" style="display:none">

        <div class="nav-bar">
        </div>

        <div id="transfer" class="transfer">

            <form action="" method="POST" class="animate-bottom">

                <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'&cancel=1'?>" class="btn btn-danger">Cancel the payment</a>

                <h1><b>Transfering to <?php echo "<b>".$receiver_name."<b/>" ?>:</b></h1>
                <label for="amount"><h2>Enter the amount:</h2></label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">₹</div>
                    </div>
                    <div class="">
                        <input type="number" name="amount" class="form-control " required><br>
                    </div>

                </div>
                <input type="submit" value="submit" class="btn btn-primary">

            </form>
        </div>

</body>
</html>

<style>

    body{
        font-family:initial;
    }

    h1{
        color:#3498db;
        margin:20px 0 20px 0;
    }

    .nav-bar{
        text-align:center;
        margin:0;
        padding:25px;
        background-color:#212529;
        color:white;
        width:100%;
    }

    .transfer{
        width:100%;
        background-color:rgb(100, 99, 99);
        padding:40px;
        color:white;
        opacity: 0.9 ;
    }

    .btn{
        width:150px;
        margin: 20px 0 20px 0;
    }
    form{
        margin-left:20px;
    }

    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
           -webkit-appearance: none;
           margin: 0;
       } 
       
    input[type="number"] {
        -moz-appearance: textfield;
         width:350px;
        display:inline;
       }
    
    .input-group{
        margin-top:20px;
    }
       

</style>
<?php

include 'dbconfig.php';
session_start();
$uname = "".$_SESSION['E_Name'];
$Id = "".$_SESSION['Id'];



if(isset($_POST['btnSubmit']))
{
    $pname = $_POST['cbxProductName'];
    $pEname = $_POST['cbxRecEmp'];
    $pqty = $_POST['txtQty'];
    $date = date("Y-m-d");

    if($pqty > 0 && $pname > 0)
    {
        $sqlInsert = "INSERT INTO tb_stock_out(`P_Id`, `E_Id`, `ER_Id`, `SO_Date`, `SO_QTY`) VALUES ('$pname','$Id','$pEname','$date','$pqty')";
        $sqlResult = mysqli_query($conn,$sqlInsert);
        $ex = "Stock out has been successfully";
        header("Location: stockOut.php?error=$ex");
    }
    else
    {
        $ex = "Product stock less then ZERO. Please input current value. Thank you!";
        header("Location: stockOut.php?error=$ex");
    }
}
else
{
    $ex = "Stock out has been un-successfully";
    header("Location: stockOut.php?error=$ex");
}
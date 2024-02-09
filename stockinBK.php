<?php

include 'dbconfig.php';
session_start();
$uname = "".$_SESSION['E_Name'];
$Id = "".$_SESSION['Id'];



if(isset($_POST['btnSubmit']))
{
    $pname = $_POST['cbxProductName'];
    $pqty = $_POST['txtQty'];
    $remark = $_POST['txtRemark'];
    $date = date("Y-m-d");

    if($pqty > 0 && $pname > 0)
    {
        $sqlInsert = "INSERT INTO `tb_stock_in`(`P_Id`, `E_Id`, `SI_Date`, `SI_QTY`, `SI_Remark`) VALUES ('$pname','$Id','$date','$pqty','$remark')";
        $sqlResult = mysqli_query($conn,$sqlInsert);
        $ex = "Stock in has been successfully";
        header("Location: stockIn.php?error=$ex");
    }
    else
    {
        $ex = "Product stock less then ZERO. Please input current value. Thank you!";
        header("Location: stockIn.php?error=$ex");
    }
}
else
{
    $ex = "Stock in has been un-successfully";
    header("Location: stockIn.php?error=$ex");
}
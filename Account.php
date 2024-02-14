<?php 

include 'dbconfig.php';

session_start();

    if(isset($_SESSION['Id']) && isset($_SESSION['E_Name']))
    {
        $uname = "".$_SESSION['E_Name'];
        $Id = "".$_SESSION['Id'];
        if($uname && $Id)
        {
            $_SESSION['E_Name'] = $uname;
            $_SESSION['Id'] = $Id;
        }
        $accountPermisstion = 1;
        $sqlAccount = "SELECT * FROM tb_employeeinfo WHERE Id = $Id AND E_AccountPermittion = $accountPermisstion";
        $sqlAccountResult = mysqli_query($conn,$sqlAccount);
        $row = mysqli_fetch_assoc($sqlAccountResult);
        if($row['E_AccountPermittion'] == $accountPermisstion)
        {
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deegautex - Employee Evaluation</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="Account.css"  media="screen">
    <link rel="stylesheet" href="styleProductFilter.css">

</head>
<body>

<?php 
include 'menuBar.php'; 
$toDate = date("Y/m/d");
?>
<br>


<!-- dashboard section start -->


<section id="account-section" class="">
    <div class="container ">
        <div class="row">
            <div class="col pb-3">
            <span class="sticky sticky-top" onclick="openNav()">&#9776; Dashboard</span>
            </div>
        </div>
    </div>
</section>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#send-monet-section" onclick="closeNav()">Send Money</a>
    <a href="#monet-received-section" onclick="closeNav()">Money Received</a>
    <a href="#bank-diposit" onclick="closeNav()">Bank Diposit</a>
    <a href="#bank-withdraw" onclick="closeNav()">Bank Withdraw</a>
    <a href="#bank-to-bank" onclick="closeNav()">Bank to Bant-transfer</a>
    <a href="salary" onclick="closeNav()">Salary</a>
    <a href="#daily-expenses" onclick="closeNav()">Expenses</a>
</div>

<!-- dashboard section end -->

<?php if(isset($_GET['error'])){ ?> <h3 class="error text-center text-dark mark"><?php echo $_GET['error']; ?></h3> <?php } ?>

<!-- Send monet section start -->

<section id="send-monet-section" class="bg-secondary text-light py-4">
    <div class="container">
        <div class="row mt-4">
            <h3 class="text-center display-4 mb-4">Sent Money Section</h3>
            <div class="col-md-6 ">
                <form action="moneyTransectionBK?id=<?php echo $Id;?>" method="POST">
                    <select name="cbxEmployee" class="form-control" id="designation">
                        <?php 
                            $sqlData = "SELECT * FROM `tb_employeeinfo` WHERE E_Status = 1";
                            $sqlResult = mysqli_query($conn,$sqlData); ?>
                        <option selected disabled>Select Receiver Name</option>
                        <?php while($row = mysqli_fetch_array($sqlResult)){?>
                        <option value="<?php echo $row['Id']; ?>"><?php echo $row['E_Name']; ?></option>
                        <?php } ?>
                    </select>
                    <div class="form-group">
                        <label for="ammount">Enter Total Amount *</label>
                        <input type="number" name="txtAmount" class="form-control" id="ammount" placeholder="Enter your amount">
                    </div>
                    <div class="form-group">
                        <label for="Remark">Remark (Optional)</label>
                        <textarea class="form-control" name="txtRemark" id="Remark" rows="3" placeholder="Enter your Remark"></textarea>
                    </div>
                    <button name="btnSend" type="submit" class="button-30 mt-3">Send</button>
                    <button name="btnCancel" type="submit" class="button-30 mt-3">Cancel</button>
                    <button name="btnOther" type="submit" class="button-30 mt-3">More</button>
                </form>
            </div>
            <div class="col-md-6 overflow-auto">
                <!-- <h3 class="text-center">Sent Money Data show</h3> -->
                <table class="table table-bordered table-dark text-center">
                    <thead>
                        <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Date</th>
                        <th scope="col">Reciver</th>
                        <th scope="col">Ammount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlShow = "SELECT * FROM tb_moneysentandreceived WHERE TransectionType = 1 AND date = '$toDate'";
                        $sqlShowResult = mysqli_query($conn,$sqlShow);
                        $i=1;
                        while($row = mysqli_fetch_array($sqlShowResult)){?>
                        <tr>
                            <th scope="row"><?php echo $i;?></th>
                            <td><?php echo $row['date'];?></td>
                            <?php $re2Id = $row['REId']; ?>
                            <?php
                            $sql2Data = "SELECT EMP.E_Name FROM `tb_employeeinfo` AS EMP WHERE Id = '$re2Id'";
                            $sql2Result = mysqli_query($conn,$sql2Data);
                            foreach($sql2Result as $val){?>
                                <td><?php echo $val['E_Name'];?></td>
                            <?php } ?>
                            <td><?php echo '৳'.$row['Amount'].'/-';?></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
            <div class="text-end">
            <?php
                $sqlTotalAmount = "SELECT SUM(Amount) FROM tb_moneysentandreceived WHERE TransectionType = 1 AND date = '$toDate'";
                $sqlToalAmountResult = mysqli_query($conn,$sqlTotalAmount);
                while($row = mysqli_fetch_array($sqlToalAmountResult)){?>
                    <h2>Total Received: <?php echo $row['SUM(Amount)'];?>/-</h2>
            <?php    }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Send monet section end -->


<!-- Send monet section start -->

<section id="monet-received-section" class="bg-dark text-light py-4">
    <div class="container">
        <div class="row mt-4">
            <h3 class="text-center display-4 mb-4">Money Received Section</h3>
            <div class="col-md-6 overflow-auto">
                <!-- <h3 class="text-center">Money Received Data show</h3> -->
                <table class="table table-bordered table-dark text-center">
                    <thead>
                        <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Date</th>
                        <th scope="col">Reciver</th>
                        <th scope="col">Ammount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sqlShow = "SELECT * FROM tb_moneysentandreceived WHERE TransectionType = 2 AND date = '$toDate'";
                        $sqlShowResult = mysqli_query($conn,$sqlShow);
                        $i=1;
                        while($row = mysqli_fetch_array($sqlShowResult)){?>
                        <tr>
                            <th scope="row"><?php echo $i;?></th>
                            <td><?php echo $row['date'];?></td>
                            <?php $re2Id = $row['SEId']; ?>
                            <?php
                            $sql2Data = "SELECT EMP.E_Name FROM `tb_employeeinfo` AS EMP WHERE Id = '$re2Id'";
                            $sql2Result = mysqli_query($conn,$sql2Data);
                            foreach($sql2Result as $val){?>
                                <td><?php echo $val['E_Name'];?></td>
                            <?php } ?>
                            <td><?php echo '৳'.$row['Amount'].'/-';?></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 ">
                <form action="moneyTransectionBK?id=<?php echo $Id;?>" method="POST">
                    <select name="cbxEmployee2" class="form-control" id="designation">
                        <?php 
                            $sqlData = "SELECT * FROM `tb_employeeinfo` WHERE E_Status = 1";
                            $sqlResult = mysqli_query($conn,$sqlData); ?>
                        <option selected disabled>Select Sender Name</option>
                        <?php while($row = mysqli_fetch_array($sqlResult)){?>
                        <option value="<?php echo $row['Id']; ?>"><?php echo $row['E_Name']; ?></option>
                        <?php } ?>
                    </select>
                    <div class="form-group">
                        <label for="ammount2">Enter Total Amount *</label>
                        <input type="number" name="txtAmount2" class="form-control" id="ammount2" placeholder="Enter your amount">
                    </div>
                    <div class="form-group">
                        <label for="Remark2">Remark (Optional)</label>
                        <textarea class="form-control" name="txtRemark2" id="Remark2" rows="3" placeholder="Enter your Remark"></textarea>
                    </div>
                    <button name="btnReceived" type="submit" class="button-30 mt-3">Received</button>
                    <button name="btnCancel" type="submit" class="button-30 mt-3">Cancel</button>
                    <button name="btnOther" type="submit" class="button-30 mt-3">More</button>
                </form>
            </div>
            <div class="">
                <?php
                $sqlTotalAmount = "SELECT SUM(Amount) FROM tb_moneysentandreceived WHERE TransectionType = 2 AND date = '$toDate'";
                $sqlToalAmountResult = mysqli_query($conn,$sqlTotalAmount);
                while($row = mysqli_fetch_array($sqlToalAmountResult)){?>
                    <h2>Total Received: <?php echo $row['SUM(Amount)'];?>/-</h2>
            <?php    }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Send monet section end -->

<!-- bank diposit section start -->

<?php 
include 'bankDiposit.php'; 
include 'dailyExpenses.php';
?>

<!-- bank diposit section end -->



<!-- <form action="" method="Post">
<input type="number" name="txt" class="form-control" id="ammount2" placeholder="Enter your Basic salary">
<input type="number" name="txtOT" class="form-control" id="ammount2" placeholder="Enter your Overtime houres">
<input type="number" name="txtAB" class="form-control" id="ammount2" placeholder="Enter your Absent day">
<input type="number" name="txtAD" class="form-control" id="ammount2" placeholder="Enter your advance money">
<button name="btnCheck2" type="submit" class="button-30 mt-3">Check</button>
</form> -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<script>
function openNav() {
document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
document.getElementById("mySidenav").style.width = "0";
}
</script>

</body>
</html>

<?php 
        }
        else
        {
            //header("Location: index.php?error=You do not have permission visit this page.Thank you!");
            //1.window.location.href = "https://deegau.com/index.php";
            echo '<script>
            alert("You do not have permission visit this page. Please go back!")
            setTimeout(function(){
                location.reload(true);
            }, 5000);
            </script>';
            exit("Note:- You do not have permission visit account section page. Please go back! or If you can access the account section page, please contact with Deegautex authority. Thank you ! !! !!!");
        }
    }
    else{
        header("Location: log.php");
        exit();
    }

?>
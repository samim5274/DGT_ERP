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

    <link rel="stylesheet" href="salary.css"  media="screen">
    <link rel="stylesheet" href="styleProductFilter.css">

</head>
<body>

<?php 
include 'menuBar.php'; 
$toDate = date("Y-m-d");
?>
<br>


<?php if(isset($_GET['error'])){ ?> <h3 class="error text-center text-dark mark"><?php echo $_GET['error']; ?></h3> <?php } ?>

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
    <a href="#salary-section" onclick="closeNav()">Salary</a>
    <a href="#AssignNextMonth-section" onclick="closeNav()">Assign Next Month</a>
</div>


<!-- dashboard section end -->



<!-- Assign for nest month section start -->

<section id="AssignNextMonth-section" class="bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <h3 class="text-center display-4">Assign for next Month</h3>
            <form action="" method="POST">
                <div class="wrapper">
                    <div class="row">
                        <label class="labels" for="designation">Select employee for the assign for next month</label><hr>
                        <div class="col-md-10">
                            <select name="cbxEmployeeASNM" class="form-control" id="designation">
                                <?php 
                                    $sqlData = "SELECT * FROM tb_employeeinfo";
                                    $sqlResult = mysqli_query($conn,$sqlData); ?>
                                <option selected disabled>Select Employee</option>
                                <?php while($row = mysqli_fetch_array($sqlResult)){?>
                                <option value="<?php echo $row['Id']; ?>"><?php echo $row['E_Name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button name="btnSearch" type="submit" class="button-30">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php

if(isset($_POST['btnSearch']))
{
    if(isset($_POST['cbxEmployeeASNM']))
    {
        $EMPId = $_POST['cbxEmployeeASNM'];
    }
    else
    {
        $EMPId = '';
    }
    if(!$EMPId)
    {
        $error = 'Employee not selected. Please select Employee name and try again.';?>
        <p class="error text-center text-dark mark"><?php echo $error; ?></p><?php
    }
    else
    {
        $sqlData = "SELECT * FROM tb_employeeinfo WHERE Id = '$EMPId'";
        $sqlResult = mysqli_query($conn,$sqlData);
        foreach($sqlResult as $val){ ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6  py-4">
                    <div class="card">
                        <a href="evaluationMarkSubmite?id=<?php echo $val['Id'];?>">
                            <img src="P_Pic/<?php echo $val['E_Image'];?>" class="img-fluid card-img-top" alt="Photo loading..." />
                        </a>
                        <div class="card-body">
                            <div class="card-title">
                                <h4><?php echo $val['E_Name'];?> (<small class="text-muted"><?php echo $val['E_BloodGroup'];?></small>)</h4>
                                <small class="text-muted"><?php echo $val['E_Designation'];?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 py-4">
                    <form action="salaryBK?epId=<?php echo $EMPId;?>" method="POST">
                        <!-- overtime houre input fild -->
                        <div class="form-group">
                            <label for="overtimeSL">Enter ( <?php echo $val['E_Name'];?> ) total overtime (H)</label>
                            <input type="number" name="txtOvertimeASNM" class="form-control" id="overtimeSL" placeholder="Enter total overtime (Houre)">
                        </div>
                        <!-- Absent day input fild -->
                        <div class="form-group">
                            <label for="absentDaySL">Total ( <?php echo $val['E_Name'];?> ) Absent day</label>
                            <input type="number" name="txtAbsentDayASNM" class="form-control" id="absentDaySL" placeholder="Enter total absent day">
                        </div>
                        <!-- Advance salary input fild -->
                        <div class="form-group">
                            <label for="advanceSalarySL">Total ( <?php echo $val['E_Name'];?> ) Advance Salary</label>
                            <input type="number" name="txtAdvanceSalaryASNM" class="form-control" id="advanceSalarySL" placeholder="Enter Advance salary">
                        </div>
                        <!-- Bonus input fild -->
                        <div class="form-group">
                            <label for="bonusSL">Bonus ( <?php echo $val['E_Name'];?> ) Amount</label>
                            <input type="number" name="txtBonusASNM" class="form-control" id="bonusSL" placeholder="Enter bonus">
                        </div>
                        <div class="form-group">
                            <label for="RemarkSL">Remark (Optional)</label>
                            <textarea class="form-control" name="txtRemarkASNM" id="RemarkSL" rows="3" placeholder="Enter your Remark"></textarea>
                        </div>
                        <div class="form-group">
                            <button name="btnAssign" type="submit" class="button-30 mt-3">Assign</button>
                            <button name="btnCancel" type="submit" class="button-30 mt-3">Cancel</button>
                            <button name="btnMore" type="submit" class="button-30 mt-3">More</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php   }
    } 
}


?>
    

<!-- Assign for nest month section end -->



<!-- Salary section start -->

<section id="salary-section" class="bg-secondary text-light">
    <div class="container">
        <div class="row">
                <h3 class="text-center display-4 my-4">Salary Segmentation</h3>
            <div class="col- mb-4">
                <form action="salaryBK?id=<?php echo $Id;?>" method="POST">
                    <div class="form-group">
                        <label for="employee">Select Employee</label>
                        <select name="cbxEmployeeSL" require class="form-control" id="employee">
                            <?php 
                                $sqlData = "SELECT * FROM `tb_employeeinfo` WHERE E_Status = 1";
                                $sqlResult = mysqli_query($conn,$sqlData); ?>
                            <option selected disabled>Select Employee</option>
                            <?php while($row = mysqli_fetch_array($sqlResult)){?>
                            <option value="<?php echo $row['Id']; ?>"><?php echo $row['E_Name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- basic salary input fild -->
                    <div class="form-group">
                        <label for="ammountSL">Enter Basic Salary *</label>
                        <input type="number" name="txtBasicSalarySL" class="form-control" id="ammountSL" placeholder="Enter basic salary">
                    </div>
                    <button name="btnSalary" type="submit" class="button-30 mt-3">Salary</button>
                    <button name="btnCancel" type="submit" class="button-30 mt-3">Cancel</button>
                    <button name="btnFilter" type="submit" class="button-30 mt-3">Filter</button>
                </form>
            </div>
        </div>
        <div class="row">            
            <div class="col">
                <!-- <table class="table table-bordered table-dark text-center">
                    <thead>
                        <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Basic Salary</th>
                        <th scope="col">House Rent</th>
                        <th scope="col">Medical cost</th>
                        <th scope="col">Transport</th>
                        <th scope="col">Overtime (Houre)</th>
                        <th scope="col">Overtime (Money)</th>
                        <th scope="col">Absent Day</th>
                        <th scope="col">Absent Deduct</th>
                        <th scope="col">VAT %</th>
                        <th scope="col">Provident Found</th>
                        <th scope="col">Advance</th>
                        <th scope="col">Bonus</th>
                        <th scope="col">Total Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $thisMonth = date("Ym");
                        $sqlShow = "SELECT * FROM `tb_salarysheet` WHERE MonthYear = '$thisMonth'";
                        $sqlShowResult = mysqli_query($conn,$sqlShow);
                        $i=1;
                        while($row = mysqli_fetch_array($sqlShowResult)){?>
                        <tr>
                            <th scope="row"><?php echo $i;?></th>

                            <?php $re2Id = $row['EId'];
                            $sql2Data = "SELECT EMP.E_Name FROM `tb_employeeinfo` AS EMP WHERE Id = '$re2Id'";
                            $sql2Result = mysqli_query($conn,$sql2Data);
                            foreach($sql2Result as $val){?>
                                <td><?php echo $val['E_Name'];?></td>
                            <?php } 
                            
                            $sqlDataSalaryInfo = "SELECT * FROM `tb_salaryinfo` WHERE EId = '$re2Id'";
                            $sqlDataSalaryInfoResult = mysqli_query($conn,$sqlDataSalaryInfo);
                            foreach($sqlDataSalaryInfoResult as $row){
                                $SLId = $row['Id'];
                                $bs = $row['BasicSalary'];
                                $hr = $row['HouseRent'];
                                $mc = $row['MedicalCost'];
                                $tp = $row['Transport'];
                                $vat = $row['VAT'];
                                $pbtF = $row['ProvedentFound'];
                            }

                            // $sqlDataSalarySheet = "SELECT * FROM `tb_salarysheet` WHERE SalaryId = '$SLId' AND MonthYear = '$thisMonth'";
                            ?>
                            
                            <td><?php echo '৳'.$bs.'/-';?></td>
                            <td><?php echo '৳'.$hr.'/-';?></td>
                            <td><?php echo '৳'.$mc.'/-';?></td>
                            <td><?php echo '৳'.$tp.'/-';?></td>
                            <td><?php echo '৳'.$row['OvertimeH'].'/-';?></td>
                            <td><?php echo '৳'.$row['OvertimeM'].'/-';?></td>
                            <td><?php echo '৳'.$row['AbsentD'].'/-';?></td>
                            <td><?php echo '৳'.$row['AbsentDeductM'].'/-';?></td>
                            <td><?php echo '৳'.$vat.'/-';?></td>
                            <td><?php echo '৳'.$pbtF.'/-';?></td>
                            <td><?php echo '৳'.$row['Advance'].'/-';?></td>
                            <td><?php echo '৳'.$row['Bonus'].'/-';?></td>
                            <td><?php echo '৳'.$row['TotalSalary'].'/-';?></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table> -->

                <table class="table table-bordered table-dark text-center">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Employee</th>
                            <th scope="col">Basic Salary</th>
                            <th scope="col">House Rent</th>
                            <th scope="col">Medical cost</th>
                            <th scope="col">Transport</th>
                            <th scope="col">VAT %</th>
                            <th scope="col">Provident Found</th>
                            <th scope="col">Overtime (Houre)</th>
                            <th scope="col">Overtime (Money)</th>
                            <th scope="col">Absent Day</th>
                            <th scope="col">Absent Deduct</th>
                            <th scope="col">Advance</th>
                            <th scope="col">Bonus</th>
                            <th scope="col">Total Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlSalaryInfo = "SELECT * FROM `tb_salaryinfo`";
                        $sqlSalaryInfoResult = mysqli_query($conn,$sqlSalaryInfo);
                        $i=1;
                        while($row = mysqli_fetch_array($sqlSalaryInfoResult))
                        {?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <?php echo $SLID = $row['iD'];?>
                                <td><?php echo $eid = $row['EId'];?></td>
                                <td><?php echo $row['BasicSalary'];?></td>
                                <td><?php echo $row['HouseRent'];?></td>
                                <td><?php echo $row['MedicalCost'];?></td>
                                <td><?php echo $row['Transport'];?></td>
                                <td><?php echo $row['VAT'];?></td>
                                <td><?php echo $row['ProvedentFound'];?></td>
                                <?php
                                $thisMonth = date("Ym");
                                $sqlSalarySheet = "SELECT * FROM `tb_salarysheet` WHERE EId = '$eid' AND SalaryId = '$SLID' AND MonthYear = '$thisMonth'";
                                $sqlSalarySheetResult = mysqli_query($conn,$sqlSalarySheet);
                                foreach($sqlSalarySheetResult AS $val)
                                {?>
                                    
                            <?php    }
                                ?>
                                <td><?php echo $val['OvertimeH'];?></td>
                                <td><?php echo $val['OvertimeM'];?></td>
                                <td><?php echo $val['AbsentD'];?></td>
                                <td><?php echo $val['AbsentDeductM'];?></td>
                                <td><?php echo $val['Advance'];?></td>
                                <td><?php echo $val['Bonus'];?></td>
                            </tr>
                    <?php $i++; }
                        
                        ?>
                    </tbody>
                </table>

                
            </div>

             <!-- <div class="text-end">
                <?php
                    $sqlTotalAmount = "SELECT SUM(TotalSalary) FROM tb_salarysheet WHERE MonthYear = '$thisMonth'";
                    $sqlToalAmountResult = mysqli_query($conn,$sqlTotalAmount);
                    while($row = mysqli_fetch_array($sqlToalAmountResult)){?>
                        <h2>Total Salary: <?php echo $row['SUM(TotalSalary)'];?>/-</h2>
                <?php    }
                    ?>
            </div> -->

        </div>
    </div>
</section>

<!-- Salary section end -->





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


<!-- overtime houre input fild
<div class="form-group">
    <label for="overtimeSL">Enter total overtime (H)</label>
    <input type="number" name="txtOvertimeSL" class="form-control" id="overtimeSL" placeholder="Enter total overtime (Houre)">
</div>
Absent day input fild
<div class="form-group">
    <label for="absentDaySL">Total Absent day</label>
    <input type="number" name="txtAbsentDaySL" class="form-control" id="absentDaySL" placeholder="Enter total absent day">
</div>
Advance salary input fild
<div class="form-group">
    <label for="advanceSalarySL">Total Advance Salary</label>
    <input type="number" name="txtAdvanceSalarySL" class="form-control" id="advanceSalarySL" placeholder="Enter Advance salary">
</div>
Bonus input fild
<div class="form-group">
    <label for="bonusSL">Bonus Amount</label>
    <input type="number" name="txtBonusSL" class="form-control" id="bonusSL" placeholder="Enter bonus">
</div>
<div class="form-group">
    <label for="RemarkSL">Remark (Optional)</label>
    <textarea class="form-control" name="txtRemarkSL" id="RemarkSL" rows="3" placeholder="Enter your Remark"></textarea>
</div> -->

<!-- foreach($sqlDataSalaryInfoResult as $row){
    $SLId = $row['Id'];
    $EID = $row['EId'];
    $bs = $row['BasicSalary'];
    $hr = $row['HouseRent'];
    $mc = $row['MedicalCost'];
    $tp = $row['Transport'];
    $vat = $row['VAT'];
    $pbtF = $row['ProvedentFound'];
}
$thisMonth = date("Ym");
$sqlSalarySheet = "SELECT * FROM `tb_salarysheet` WHERE SalaryId = '$SLId' AND MonthYear = '$thisMonth'";
$sqlSalarySheetResult = mysqli_query($conn,$sqlSalarySheet);
foreach($sqlDataSalaryInfoResult as $row){
    $OTH = $row['OvertimeH'];
    $OTM = $row['OvertimeM'];
    $ABD = $row['AbsentD'];
    $ABDM = $row['AbsentDeductM'];
    $AD = $row['Advance'];
    $BNS = $row['Bonus'];
} -->
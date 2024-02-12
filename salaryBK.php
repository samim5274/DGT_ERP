<?php
include 'dbconfig.php';
if(isset($_GET['id']))
{
    $SEid = $_GET['id'];
}
else
{
    $SEid = '';
}


// ==================== Salary section start ==================================== //


if(isset($_POST['btnSalaryOld']))
{
    $employee = $_POST['cbxEmployeeSL'];
    $sqlFilter = "SELECT * FROM tb_salarysheet WHERE EId = '$employee'";
    $sqlFilterResult = mysqli_query($conn, $sqlFilter);
    if(mysqli_num_rows($sqlFilterResult) > 0)
    {
        $ex = "This Employee are salary already created! You don't create salary for the employee. Thank you !";
        header("Location:salary?error=$ex");        
    }
    else
    {     
        function calculateSalary($epid,$bs,$hr,$mc,$tp,$ot,$otm,$abd,$abm,$vt,$pdtf,$ad,$rmk,$bns,$d)
        {
            $totalSalary = ($bs+$hr+$mc+$tp+$otm+$bns) - ($abm+$vt+$pdtf+$ad);
            global $conn;   
            $date2 = date("Y-m-d");
            $sqlInsertSalary = "INSERT INTO `tb_salarysheet`(`Date`,`EId`, `BasicSalary`, `HouseRent`, `MedicalCost`, `Transport`, `OvertimeH`, `OvertimeM`, `AbsentD`, `AbsentDedusctM`, `VAT`, `ProvidentFound`, `Advance`, `Remark`, `Bonus`,`MonthYear`,`TotalSalary`) VALUES ('$date2','$epid','$bs','$hr','$mc','$tp','$ot','$otm','$abd','$abm','$vt','$pdtf','$ad','$rmk','$bns','$d','$totalSalary')";
            $sqlInSalaryResult = mysqli_query($conn, $sqlInsertSalary);
            if(!$sqlInSalaryResult)
            {
                $ex = "Salary transection fail. Please try again !";
                header("Location:salary?error=$ex");
            }
            else
            {
                $ex = 'salary transection successfully. Here is date: '.$date2.' and Salary: '.$totalSalary.'/-';
                header("Location:salary?error=$ex");
            }
        }

        $date = date('Ym'); 
        $Eid = $_POST['cbxEmployeeSL'];
        $BasicSalary = $_POST['txtBasicSalarySL'];
        $Advance = $_POST['txtAdvanceSalarySL'];
        $Bonus = $_POST['txtBonusSL'];
        $remark = $_POST['txtRemarkSL'];

        $Overtime = $_POST['txtOvertimeSL'];
        $OvertimeMoney = (($BasicSalary/26)/8)*$Overtime;
        $OvertimeMoney = round($OvertimeMoney,0);
            //echo "Total overtime houser ".$Overtime."h total amount is: ".$OvertimeMoney."/- ";

        $AbsentDay = $_POST['txtAbsentDaySL'];
        $AbsentDeduct = ($BasicSalary/26)*$AbsentDay;
        $AbsentDeduct = round($AbsentDeduct,0);
            //echo "Absent Deduct for ".$AbsentDay." days total amount is: ".$AbsentDeduct."/- ";

        switch($BasicSalary)
        {
            case $BasicSalary <= 10000:
                $houseRent = ((110*$BasicSalary)/100)-$BasicSalary;
                    //echo "House Rent is 10%: ".$houseRent.'/-  ';
                $medicalCost = ((110*$BasicSalary)/100)-$BasicSalary;
                    //echo " Medical cost is 10%: ".$medicalCost.'/-  ';
                $transport = ((110*$BasicSalary)/100)-$BasicSalary;
                    //echo " Transport cost is 10%: ".$transport.'/-  ';
                $VAT = ((105*$BasicSalary)/100)-$BasicSalary;
                    //echo " VAT is 5%: ".$VAT.'/-  ';
                $PbtFound = ((105*$BasicSalary)/100)-$BasicSalary;
                    //echo " Provident found is 5%: ".$PbtFound.'/-  ';
                //function call
                calculateSalary($Eid,$BasicSalary,$houseRent,$medicalCost,$transport,$Overtime,$OvertimeMoney,$AbsentDay,$AbsentDeduct,$VAT,$PbtFound,$Advance,$remark,$Bonus,$date);
                break;
            case $BasicSalary <= 25000:
                $houseRent = ((125*$BasicSalary)/100)-$BasicSalary;
                    // echo "House Rent is 25%: ".$houseRent.'/-  ';
                $medicalCost = ((125*$BasicSalary)/100)-$BasicSalary;
                    // echo " Medical cost is 25%: ".$medicalCost.'/-  ';
                $transport = ((125*$BasicSalary)/100)-$BasicSalary;
                    // echo " Transport cost is 25%: ".$transport.'/-  ';
                $VAT = ((107*$BasicSalary)/100)-$BasicSalary;
                    // echo " VAT is 7%: ".$VAT.'/-  ';
                $PbtFound = ((107*$BasicSalary)/100)-$BasicSalary;
                    // echo " Provident found is 7%: ".$PbtFound.'/-  ';
                //function call
                calculateSalary($Eid,$BasicSalary,$houseRent,$medicalCost,$transport,$Overtime,$OvertimeMoney,$AbsentDay,$AbsentDeduct,$VAT,$PbtFound,$Advance,$remark,$Bonus,$date);
                break;
            case $BasicSalary <= 30000:
                $houseRent = ((130*$BasicSalary)/100)-$BasicSalary;
                    // echo "House Rent is 30%: ".$houseRent.'/-  ';
                $medicalCost = ((130*$BasicSalary)/100)-$BasicSalary;
                    // echo " Medical cost is 30%: ".$medicalCost.'/-  ';
                $transport = ((130*$BasicSalary)/100)-$BasicSalary;
                    // echo " Transport cost is 30%: ".$transport.'/-  ';
                $VAT = ((108*$BasicSalary)/100)-$BasicSalary;
                    // echo " VAT is 8%: ".$VAT.'/-  ';
                $PbtFound = ((108*$BasicSalary)/100)-$BasicSalary;
                    // echo " Provident found is 8%: ".$PbtFound.'/-  ';
                //function call
                calculateSalary($Eid,$BasicSalary,$houseRent,$medicalCost,$transport,$Overtime,$OvertimeMoney,$AbsentDay,$AbsentDeduct,$VAT,$PbtFound,$Advance,$remark,$Bonus,$date);
                break;
            case $BasicSalary <= 40000:
                $houseRent = ((140*$BasicSalary)/100)-$BasicSalary;
                    // echo "House Rent is 40%: ".$houseRent.'/-  ';
                $medicalCost = ((140*$BasicSalary)/100)-$BasicSalary;
                    // echo " Medical cost is 40%: ".$medicalCost.'/-  ';
                $transport = ((140*$BasicSalary)/100)-$BasicSalary;
                    // echo " Transport cost is 40%: ".$transport.'/-  ';
                $VAT = ((109*$BasicSalary)/100)-$BasicSalary;
                    // echo " VAT is 9%: ".$VAT.'/-  ';
                $PbtFound = ((109*$BasicSalary)/100)-$BasicSalary;
                    // echo " Provident found is 9%: ".$PbtFound.'/-  ';
                //function call
                calculateSalary($Eid,$BasicSalary,$houseRent,$medicalCost,$transport,$Overtime,$OvertimeMoney,$AbsentDay,$AbsentDeduct,$VAT,$PbtFound,$Advance,$remark,$Bonus,$date);
                break;
            case $BasicSalary <= 50000:
                $houseRent = ((150*$BasicSalary)/100)-$BasicSalary;
                    // echo "House Rent is 50%: ".$houseRent.'/-  ';
                $medicalCost = ((150*$BasicSalary)/100)-$BasicSalary;
                    // echo " Medical cost is 50%: ".$medicalCost.'/-  ';
                $transport = ((150*$BasicSalary)/100)-$BasicSalary;
                    // echo " Transport cost is 50%: ".$transport.'/-  ';
                $VAT = ((110*$BasicSalary)/100)-$BasicSalary;
                    // echo " VAT is 10%: ".$VAT.'/-  ';
                $PbtFound = ((110*$BasicSalary)/100)-$BasicSalary;
                    // echo " Provident found is 10%: ".$PbtFound.'/-  ';
                //function call
                calculateSalary($Eid,$BasicSalary,$houseRent,$medicalCost,$transport,$Overtime,$OvertimeMoney,$AbsentDay,$AbsentDeduct,$VAT,$PbtFound,$Advance,$remark,$Bonus,$date);
                break;
            case $BasicSalary <= 100000:
                $houseRent = ((170*$BasicSalary)/100)-$BasicSalary;
                    // echo "House Rent is 70%: ".$houseRent.'/-  ';
                $medicalCost = ((170*$BasicSalary)/100)-$BasicSalary;
                    // echo " Medical cost is 70%: ".$medicalCost.'/-  ';
                $transport = ((170*$BasicSalary)/100)-$BasicSalary;
                    // echo " Transport cost is 70%: ".$transport.'/-  ';
                $VAT = ((115*$BasicSalary)/100)-$BasicSalary;
                    // echo " VAT is 15%: ".$VAT.'/-  ';
                $PbtFound = ((115*$BasicSalary)/100)-$BasicSalary;
                    // echo " Provident found is 15%: ".$PbtFound.'/-  ';
                //function call
                calculateSalary($Eid,$BasicSalary,$houseRent,$medicalCost,$transport,$Overtime,$OvertimeMoney,$AbsentDay,$AbsentDeduct,$VAT,$PbtFound,$Advance,$remark,$Bonus,$date);
                break;
            default:
                echo "Do not increase House rent.";
                echo "Do not increase Medical Cost.";
                echo "Do not increase Transport.";
        }
    }
}

if(isset($_POST['btnSalary']))
{
    function createSalary($idE,$bs,$hr,$mc,$tp,$vat,$pbtf)
    {
        global $conn;
        $sqlData = "INSERT INTO `tb_salaryinfo`(`EId`, `BasicSalary`, `HouseRent`, `MedicalCost`, `Transport`, `VAT`, `ProvedentFound`) VALUES ('$idE','$bs','$hr','$mc','$tp','$vat','$pbtf')";
        $sqlDataResult = mysqli_query($conn,$sqlData);
        if(!$sqlDataResult)
        {
            $ex = "Salary information creation fail. Please try again !";
            header("Location:salary?error=$ex");
        }
        else
        {
            $ex = 'Salary information creation successfully.';
            header("Location:salary?error=$ex");
        }
    }

    $employee = $_POST['cbxEmployeeSL'];
    $sqlFilter = "SELECT * FROM tb_salaryinfo WHERE EId = '$employee'";
    $sqlFilterResult = mysqli_query($conn, $sqlFilter);
    if(mysqli_num_rows($sqlFilterResult) > 0)
    {
        $ex = "This Employee are salary already created! You don't create salary for the employee. Thank you !";
        header("Location:salary?error=$ex");        
    }
    else
    {
        $EmId = $_POST['cbxEmployeeSL'];
        $BasicSalary = $_POST['txtBasicSalarySL'];

        switch($BasicSalary)
        {
            case $BasicSalary <= 10000:
                $houseRent = ((110*$BasicSalary)/100)-$BasicSalary;
                $medicalCost = ((110*$BasicSalary)/100)-$BasicSalary;
                $transport = ((110*$BasicSalary)/100)-$BasicSalary;
                $VAT = ((105*$BasicSalary)/100)-$BasicSalary;
                $PbtFound = ((105*$BasicSalary)/100)-$BasicSalary;
                createSalary($EmId,$BasicSalary,$houseRent,$medicalCost,$transport,$VAT,$PbtFound);
                break;
            case $BasicSalary <= 25000:
                $houseRent = ((125*$BasicSalary)/100)-$BasicSalary;
                $medicalCost = ((125*$BasicSalary)/100)-$BasicSalary;
                $transport = ((125*$BasicSalary)/100)-$BasicSalary;
                $VAT = ((107*$BasicSalary)/100)-$BasicSalary;
                $PbtFound = ((107*$BasicSalary)/100)-$BasicSalary;
                createSalary($EmId,$BasicSalary,$houseRent,$medicalCost,$transport,$VAT,$PbtFound);
                break;
            case $BasicSalary <= 30000:
                $houseRent = ((130*$BasicSalary)/100)-$BasicSalary;
                $medicalCost = ((130*$BasicSalary)/100)-$BasicSalary;
                $transport = ((130*$BasicSalary)/100)-$BasicSalary;
                $VAT = ((108*$BasicSalary)/100)-$BasicSalary;
                $PbtFound = ((108*$BasicSalary)/100)-$BasicSalary;
                createSalary($EmId,$BasicSalary,$houseRent,$medicalCost,$transport,$VAT,$PbtFound);
                break;
            case $BasicSalary <= 40000:
                $houseRent = ((140*$BasicSalary)/100)-$BasicSalary;
                $medicalCost = ((140*$BasicSalary)/100)-$BasicSalary;
                $transport = ((140*$BasicSalary)/100)-$BasicSalary;
                $VAT = ((109*$BasicSalary)/100)-$BasicSalary;
                $PbtFound = ((109*$BasicSalary)/100)-$BasicSalary;
                createSalary($EmId,$BasicSalary,$houseRent,$medicalCost,$transport,$VAT,$PbtFound);
                break;
            case $BasicSalary <= 50000:
                $houseRent = ((150*$BasicSalary)/100)-$BasicSalary;
                $medicalCost = ((150*$BasicSalary)/100)-$BasicSalary;
                $transport = ((150*$BasicSalary)/100)-$BasicSalary;
                $VAT = ((110*$BasicSalary)/100)-$BasicSalary;
                $PbtFound = ((110*$BasicSalary)/100)-$BasicSalary;
                createSalary($EmId,$BasicSalary,$houseRent,$medicalCost,$transport,$VAT,$PbtFound);
                break;
            case $BasicSalary <= 100000:
                $houseRent = ((170*$BasicSalary)/100)-$BasicSalary;
                $medicalCost = ((170*$BasicSalary)/100)-$BasicSalary;
                $transport = ((170*$BasicSalary)/100)-$BasicSalary;
                $VAT = ((115*$BasicSalary)/100)-$BasicSalary;
                $PbtFound = ((115*$BasicSalary)/100)-$BasicSalary;
                createSalary($EmId,$BasicSalary,$houseRent,$medicalCost,$transport,$VAT,$PbtFound);
                break;
            default:
                $houseRent = 0;
                $medicalCost = 0;
                $transport = 0;
                $VAT = ((115*$BasicSalary)/100)-$BasicSalary;
                $PbtFound = ((115*$BasicSalary)/100)-$BasicSalary;
                createSalary($EmId,$BasicSalary,$houseRent,$medicalCost,$transport,$VAT,$PbtFound);
        }
    }
}


// ==================== Salary section end ==================================== //


// ==================== Assign for next montgh start ==================================== //

if(isset($_POST['btnAssign']))
{
    if(isset($_GET['epId']))
    {
        $Eid = $_GET['epId'];
    }
    else
    {
        $Eid = '';
    }
    // basic salary search

    $sqlBS = "SELECT * FROM `tb_salaryinfo` WHERE EId = '$Eid'";
    $sqlBSResult = mysqli_query($conn,$sqlBS);
    if(mysqli_num_rows($sqlBSResult) > 0)
    {
        foreach($sqlBSResult as $row)
        {
            $SalaryId = $row['Id'];
            $BasicSalary = $row['BasicSalary'];
            $HouserRent = $row['HouseRent'];
            $MedicalCost = $row['MedicalCost'];
            $Transport = $row['Transport'];
            $VAT = $row['VAT'];
            $ProvidentFound = $row['ProvedentFound'];
        }
    }

    $MonthYear = date('Ym');
    $date = date("Y-m-d");
    $Advance = $_POST['txtAdvanceSalaryASNM'];
    $Bonus = $_POST['txtBonusASNM'];
    $remark = $_POST['txtRemarkASNM'];

    $Overtime = $_POST['txtOvertimeASNM'];
    $OvertimeMoney = (($BasicSalary/26)/8)*$Overtime;
    $OvertimeMoney = round($OvertimeMoney,0);

    $AbsentDay = $_POST['txtAbsentDayASNM'];
    $AbsentDeduct = ($BasicSalary/26)*$AbsentDay;
    $AbsentDeduct = round($AbsentDeduct,0);

    // echo "Employee id: ".$Eid."/- Salary id: ".$SalaryId."/- Date: ".$date."/- MonthYear: ".$MonthYear."/- Overtime H : ".$Overtime."/- Overtime Money: ".$OvertimeMoney."/- Absent day: ".$AbsentDay."/- Absent money deduct: ".$AbsentDeduct."/- Basic salary: ".$BasicSalary."/- House Rent: ".$HouserRent."/- Medical cost : ".$MedicalCost."/- Transport : ".$Transport."/- VAT : ".$VAT."/- Provident found: ".$ProvidentFound."/-";

    $sqlSalarySheetData = "INSERT INTO `tb_salarysheet`(`SalaryId`, `EId`, `Date`, `MonthYear`, `OvertimeH`, `OvertimeM`, `AbsentD`, `AbsentDeductM`, `Advance`, `Bouns`) VALUES ('$SalaryId','$Eid','$date','$MonthYear','$Overtime','$OvertimeMoney','$AbsentDay','$AbsentDeduct','$Advance','$Bonus')";
    $sqlSalarySheetDataResult = mysqli_query($conn,$sqlSalarySheetData);
    if(!$sqlSalarySheetDataResult)
    {
        $ex = "Salary sheet creation fail. Please try again !";
        header("Location:salary?error=$ex");
    }
    else
    {
        $ex = "Salary sheet creation successfully.";
        header("Location:salary?error=$ex");
    }
}

// ==================== Assign for next montgh start ==================================== //

// check salary sheet creation
if(isset($_POST['btnMore']))
{
    if(isset($_GET['epId']))
    {
        $Eid = $_GET['epId'];
    }
    else
    {
        $Eid = '';
    }

    $MonthYear = date('Ym');

    $sqlBS = "SELECT * FROM `tb_salaryinfo` WHERE EId = '$Eid'";
    $sqlBSResult = mysqli_query($conn,$sqlBS);
    if(mysqli_num_rows($sqlBSResult) > 0)
    {
        foreach($sqlBSResult as $row)
        {
            $SalaryId = $row['Id'];
        }
    }

    $sqlSalarySheetCheck = "SELECT * FROM `tb_salarysheet` WHERE SalaryId = '$SalaryId' AND EId = '$Eid' AND MonthYear = '$MonthYear'";
    $sqlSalarySheetCheckResult = mysqli_query($conn,$sqlSalarySheetCheck);
    if(mysqli_num_rows($sqlSalarySheetCheckResult) > 0)
    {
        $ex = "Salary sheet already created for the month of ".$MonthYear." and employee is ".$Eid." Please try to create another employees salary sheet. Thank you!";
        // header("Location:salary?error=$ex");
        echo $ex;
    }
    else
    {
        $ex = "Salary sheet not created for the month of ".$MonthYear." and for the employee ".$Eid.". Thank you!";
        // header("Location:salary?error=$ex");
        echo $ex;
    }
}


?>
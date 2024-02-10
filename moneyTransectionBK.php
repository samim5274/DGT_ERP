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

// ==================== money send section start ==================================== //

if(isset($_POST['btnSend']))
{
    $date = date("Y-m-d");
    $transectionType = 1;
    $empId = $_POST['cbxEmployee'];
    $money = $_POST['txtAmount'];
    $remark = $_POST['txtRemark'];
    //echo 'Date: '.$date.' / TT: '.$transectionType.' / Employee Id: '.$empId.' / Amount: '.$money.' / Remark: '.$remark.' / Sender: '.$SEid;

    if(empty($empId))
    {
        $ex = "Must be selected Employee. Other wise you can not send money transection. Thanks!";
        header("Location:Account?error=$ex");
    }
    elseif(empty($money))
    {
        $ex = "Must be input your transection AMOUNT. Other wise you can not send money transection. Thanks!";
        header("Location:Account?error=$ex");
    }
    else{
        $sqlData = "INSERT INTO `tb_moneysentandreceived`(`SEId`, `REId`, `date`, `Amount`, `Remark`, `TransectionType`) VALUES ('$SEid','$empId','$date','$money','$remark','$transectionType')";
        $sqlResult = mysqli_query($conn,$sqlData);
        if(!$sqlResult)
        {
            $ex = "Data save not possible. Please try again !";
            header("Location:Account?error=$ex");
        }
        else
        {
            $ex = 'Send money transfer successfully. Here is a - Date: '.$date.' / Amount: '.$money.'/-';
            header("Location:Account?error=$ex");
        }
    }
    
}


// ==================== money send section end ==================================== //



// ==================== money received section start ==================================== //


if(isset($_POST['btnReceived']))
{
    $date = date("Y-m-d");
    $transectionType = 2;
    $empId = $_POST['cbxEmployee2'];
    $money = $_POST['txtAmount2'];
    $remark = $_POST['txtRemark2'];
    //echo 'Date: '.$date.' / TT: '.$transectionType.' / Employee Id: '.$empId.' / Amount: '.$money.' / Remark: '.$remark.' / Sender: '.$SEid;

    if(empty($empId))
    {
        $ex = "Must be selected Employee. Other wise you can not received money transection. Thanks!";
        header("Location:Account?error=$ex");
    }
    elseif(empty($money))
    {
        $ex = "Must be input your transection AMOUNT. Other wise you can not received money transection. Thanks!";
        header("Location:Account?error=$ex");
    }
    else
    {
        $sqlData = "INSERT INTO `tb_moneysentandreceived`(`SEId`, `REId`, `date`, `Amount`, `Remark`, `TransectionType`) VALUES ('$empId','$SEid','$date','$money','$remark','$transectionType')";
        $sqlResult = mysqli_query($conn,$sqlData);
        if(!$sqlResult)
        {
            $ex = "Data save not possible. Please try again !";
            header("Location:Account?error=$ex");
        }
        else
        {
            $ex = 'Money received successfully. Here is a - Date: '.$date.' / Amount: '.$money.'/-';
            header("Location:Account?error=$ex");
        }
    }
}

// ==================== money received section end ==================================== //


// ==================== money diposit section start ==================================== //


if(isset($_POST['btnDiposit']))
{
    $date = date("Y-m-d");
    $transectionType = 1;
    $empId = $_POST['cbxEmployeeD'];
    $money = $_POST['txtAmount'];
    $remark = $_POST['txtRemark'];
    $accountNumber = $_POST['cbxAccount'];

    // echo 'Back code worked! Here is Date: '.$date.'--- Transection Type: '.$transectionType.'--- Employee id: '.$empId.'--- Money: '.$money.'--- Remark: '.$remark.'--- Account Number: '.$accountNumber.'--- Done!';

    if(empty($empId))
    {
        $ex = "Must be selected Employee. Other wise you can not bank diposit money transection. Thanks!";
        header("Location:Account?error=$ex");
    }
    elseif(empty($money))
    {
        $ex = "Must be input your transection AMOUNT. Other wise you can not bank diposit money transection. Thanks!";
        header("Location:Account?error=$ex");
    }
    elseif(empty($accountNumber))
    {
        $ex = "Must be selected Account Number. Other wise you can not bank diposit money transection. Thanks!";
        header("Location:Account?error=$ex");
    }
    else{
        $sqlDataDiposit = "INSERT INTO `tb_dipositandwithdrawdetail`(`AccountNumber`, `Amount`, `Date`, `TransectionType`, `EId`, `Remark`) VALUES ('$accountNumber','$money','$date','$transectionType','$empId','$remark')";
        $sqlResultDiposit = mysqli_query($conn,$sqlDataDiposit);
        if(!$sqlResultDiposit)
        {
            $ex = "Data save not possible. Please try again !";
            header("Location:Account?error=$ex");
        }
        else
        {
            $ex = $ex = 'Money Diposit Successfully. Here is date: '.$date.' and Amount: '.$money.'/-';
            header("Location:Account?error=$ex");
        }
    }
}

// ==================== money diposit section end ==================================== //


// ==================== money withdraw section start ==================================== //


if(isset($_POST['btnWithdraw']))
{
    // mone withdraw possible if total amount of specific bank account then withdraw possible implement
    $date = date("Y-m-d");
    $transectionType = 2;
    $empId = $_POST['cbxEmployeeW'];
    $money = $_POST['txtAmountW'];
    $remark = $_POST['txtRemarkW'];
    $accountNumber = $_POST['cbxAccountW'];

    // echo 'Back code worked! Here is Date: '.$date.'--- Transection Type: '.$transectionType.'--- Employee id: '.$empId.'--- Money: '.$money.'--- Remark: '.$remark.'--- Account Number: '.$accountNumber.'--- Done!';

    if(empty($empId))
    {
        $ex = "Must be selected Employee. Other wise you can not bank withdraw money transection. Thanks!";
        header("Location:Account?error=$ex");
    }
    elseif(empty($money))
    {
        $ex = "Must be input your transection AMOUNT. Other wise you can not bank withdraw money transection. Thanks!";
        header("Location:Account?error=$ex");
    }
    elseif(empty($accountNumber))
    {
        $ex = "Must be selected Account Number. Other wise you can not bank withdraw money transection. Thanks!";
        header("Location:Account?error=$ex");
    }
    else
    {
        $sqlShow = "SELECT AccountNumber,SUM(Amount) FROM `tb_dipositandwithdrawdetail`  WHERE TransectionType = 1 AND AccountNumber = '$accountNumber' GROUP BY AccountNumber";
        $sqlShowResult = mysqli_query($conn,$sqlShow);
        
        $sqlShow2 = "SELECT AccountNumber,SUM(Amount) FROM `tb_dipositandwithdrawdetail`  WHERE TransectionType = 2 AND AccountNumber = '$accountNumber' GROUP BY AccountNumber";
        $sqlShowResult2 = mysqli_query($conn,$sqlShow2);

        while($row = mysqli_fetch_array($sqlShowResult) AND $row2 = mysqli_fetch_array($sqlShowResult2))
        {
        $totalBalence = $row['SUM(Amount)'] - $row2['SUM(Amount)'];
        if($totalBalence <= 0)
        {
            $ex = "Balence withdraw not possible because you have not available balence to your account.";
            header("Location:Account?error=$ex");
        }
        else
            {
                if($money <= $totalBalence)
                {
                    $sqlDatawithdraw = "INSERT INTO `tb_dipositandwithdrawdetail`(`AccountNumber`, `Amount`, `Date`, `TransectionType`, `EId`, `Remark`) VALUES ('$accountNumber','$money','$date','$transectionType','$empId','$remark')";
                    $sqlResultwithdraw = mysqli_query($conn,$sqlDatawithdraw);
                    if(!$sqlResultwithdraw)
                    {
                        $ex = "Data save not possible. Please try again !";
                        header("Location:Account?error=$ex");
                    }
                    else
                    {
                        $ex = 'Money Withdraw Successfully. Here is date: '.$date.' and Amount: '.$money.'/-';
                        header("Location:Account?error=$ex");
                    }
                }
                else
                {
                    $ex = "Balence withdraw not possible because you have not available balence to your account.";
                    header("Location:Account?error=$ex");
                }
            }
        } 
    }
}

// ==================== money withdraw section end ==================================== //


// ==================== Bank to Bank money transfer start ==================================== //

if(isset($_POST['btnTransfer']))
{
    $Date = date("Y-m-d");
    $ToAC = $_POST['cbxAccount1'];
    $FromAC = $_POST['cbxAccount2'];
    $EmpId = $_POST['cbxEmployeeTT'];
    $Amount = $_POST['txtAmount3'];
    $Remark = $_POST['txtRemark3'];

    // echo 'Back code working done ! Date: '.$Date.' -- To Account: '.$ToAC.' -- From Account: '.$FromAC.' -- Employee Id: '.$EmpId.' -- Ammount: '.$Amount.' -- Remark: '.$Remark;

    if($ToAC === $FromAC)
    {
        $ex = "Account number is same. Bank to Bank Transection not possible. Please select the difference bank account number. And try again !";
        header("Location:Account?error=$ex");
    }
    else
    {
        if(empty($ToAC))
        {
            $ex = "Destination bank account number not found. Please select Destination Bank Account number. And try again !";
            header("Location:Account?error=$ex");
        }
        elseif(empty($FromAC))
        {
            $ex = "From bank account number not found. Please select Bank Account number where to you transfer amount. And try again !";
            header("Location:Account?error=$ex");
        }
        elseif(empty($EmpId))
        {
            $ex = "Please must be select the employee name who has gone to bank to bank transection perpose. And try again !";
            header("Location:Account?error=$ex");
        }
        elseif(empty($Amount))
        {
            $ex = "Please must be input the currect amount that you are went to transfer. And try again !";
            header("Location:Account?error=$ex");
        }
        else
        {
            $sqlShow = "SELECT AccountNumber,SUM(Amount) FROM `tb_dipositandwithdrawdetail`  WHERE TransectionType = 1 AND AccountNumber = '$FromAC' GROUP BY AccountNumber";
            $sqlShowResult = mysqli_query($conn,$sqlShow);
            
            $sqlShow2 = "SELECT AccountNumber,SUM(Amount) FROM `tb_dipositandwithdrawdetail`  WHERE TransectionType = 2 AND AccountNumber = '$FromAC' GROUP BY AccountNumber";
            $sqlShowResult2 = mysqli_query($conn,$sqlShow2);

                while($row = mysqli_fetch_array($sqlShowResult) AND $row2 = mysqli_fetch_array($sqlShowResult2)){
                $totalBalence = $row['SUM(Amount)'] - $row2['SUM(Amount)'];
                if($totalBalence <= 0)
                {
                    $ex = "Balence transfer not possible because you have not enought balence to your account.";
                    header("Location:Account?error=$ex");
                }
                else
                {
                    if($Amount <= $totalBalence)
                    {
                        $transType = 1;
                        $transType2 = 2;
                        $sqlBtoBData = "INSERT INTO `tb_banktobanktransectiondetail`(`FromAccount`, `ToAccount`, `Date`, `Amount`, `EId`, `Remark`) VALUES ('$FromAC','$ToAC','$Date','$Amount','$EmpId','$Remark')";
                        $sqlBtoBResult = mysqli_query($conn,$sqlBtoBData);

                        
                        $sqlToACData = "INSERT INTO `tb_dipositandwithdrawdetail`(`AccountNumber`, `Amount`, `Date`, `TransectionType`, `EId`, `Remark`) VALUES ('$ToAC','$Amount','$Date','$transType','$EmpId','Bank to bank transfer diposit.')";
                        $sqlToACResult = mysqli_query($conn,$sqlToACData);

                        $sqlFromACData = "INSERT INTO `tb_dipositandwithdrawdetail`(`AccountNumber`, `Amount`, `Date`, `TransectionType`, `EId`, `Remark`) VALUES ('$FromAC','$Amount','$Date','$transType2','$EmpId','Bank to bank transfer withdraw.')";                
                        $sqlFromACResult = mysqli_query($conn,$sqlFromACData);

                        if(!$sqlBtoBResult)
                        {
                            $ex = "Bank to Bank money transefer not possible. Please try again !";
                            header("Location:Account?error=$ex");
                        }
                        else
                        {
                            $ex = 'Bank to Bank money transefer successfully. Here is date: '.$Date.' and Amount: '.$Amount.'/-';
                            header("Location:Account?error=$ex");
                        }
                    }
                    else
                    {
                        $ex = "Balence transfer not possible because you have not enought balence to your account.";
                        header("Location:Account?error=$ex");
                    }
                }
            }  
        }
    }
}


// ==================== Bank to Bank money transfer end ==================================== //

// ==================== Balence check start ==================================== //

if(isset($_POST['btnCheck']))
{
    $Aa = $_POST['txt'];
    $sqlShow = "SELECT AccountNumber,SUM(Amount) FROM `tb_dipositandwithdrawdetail`  WHERE TransectionType = 1 AND AccountNumber = 'DBBL348763' GROUP BY AccountNumber";
    $sqlShowResult = mysqli_query($conn,$sqlShow);
    
    $sqlShow2 = "SELECT AccountNumber,SUM(Amount) FROM `tb_dipositandwithdrawdetail`  WHERE TransectionType = 2 AND AccountNumber = 'DBBL348763' GROUP BY AccountNumber";
    $sqlShowResult2 = mysqli_query($conn,$sqlShow2);

    while($row = mysqli_fetch_array($sqlShowResult) AND $row2 = mysqli_fetch_array($sqlShowResult2)){
        $totalBalence = $row['SUM(Amount)'] - $row2['SUM(Amount)'];
        echo ' | | '.$row['SUM(Amount)'].' - '.$row2['SUM(Amount)'].' = '.$totalBalence.'/-';
        if($totalBalence <= 0)
        {
            echo"Transection not possible.";
        }
        else
        {
            if($Aa <= $totalBalence)
            {
                echo"Transection possible.";
            }
            else
            {
                echo"Transection not possible.";
            }
        }
    }    
}
// ==================== Balence check end ==================================== //


// ==================== BDaily Expenses start ==================================== //

if(isset($_POST['btnExpenses']))
{
    $date = date("Y-m-d");
    $EId = $_POST['cbxEmployeeEX'];
    $amount = $_POST['txtAmountEX'];
    $purpose = $_POST['cbxPurposeEX'];
    $remark = $_POST['txtRemarkEX'];

    //echo 'Date: '.$date.' | | EId: '.$EId.' | | Amount: '.$amount.' | | Purpose: '.$purpose.' | | Remark: '.$remark;

    if(empty($EId))
    {
        $ex = "Employee is empty ! You have must be selected Employee name And try again !";
        header("Location:Account?error=$ex");
    }
    elseif(empty($amount))
    {
        $ex = "Amount is empty ! You must be input your expeses Amount And try again !";
        header("Location:Account?error=$ex");
    }
    elseif(empty($purpose))
    {
        $ex = "Purpose is missing ! You must be selected your expenses purpose And try again !";
        header("Location:Account?error=$ex");
    }
    else
    {
        if($amount <= 0)
        {
            $ex = "Expenses transection fail. Your amount less then zero (0). Please try again !";
            header("Location:Account?error=$ex");
        }
        else
        {
            $sqlExpenses = "INSERT INTO `tb_dailyexpenses`(`EId`, `Date`, `Amount`, `PurposeId`, `Remark`) VALUES ('$EId','$date','$amount','$purpose','$remark')";
            $sqlExpensesResult = mysqli_query($conn,$sqlExpenses);
            if(!$sqlExpensesResult)
            {
                $ex = "Expenses transection fail. Please try again !";
                header("Location:Account?error=$ex");
            }
            else
            {
                $ex = 'Expenses transection successfully. Here is date: '.$date.' and Amount: '.$amount.'/-';
                header("Location:Account?error=$ex");
            }
        }
    }
}

// ==================== BDaily Expenses end ==================================== //



// ==================== Salary section start ==================================== //

if(isset($_POST['btnSalaey']))
{
    function calculateSalary($d,$epid,$bs,$hr,$mc,$tp,$ot,$otm,$abd,$abm,$vt,$pdtf,$ad,$rmk,$bns)
    {
        $totalSalary = ($bs+$hr+$mc+$tp+$otm+$bns) - ($abm+$vt+$pdtf+$ad);
        global $conn;   
        $sqlInsertSalary = "INSERT INTO `tb_salarysheet`(`Date`, `EId`, `BasicSalary`, `HouseRent`, `MedicalCost`, `Transport`, `OvertimeH`, `OvertimeM`, `AbsentD`, `AbsentDedusctM`, `VAT`, `ProvidentFound`, `Advance`, `Remark`, `Bonus`,`TotalSalary`) VALUES ('$d','$epid','$bs','$hr','$mc','$tp','$ot','$otm','$abd','$abm','$vt','$pdtf','$ad','$rmk','$bns','$totalSalary')";
        $sqlInSalaryResult = mysqli_query($conn, $sqlInsertSalary);
        if(!$sqlInSalaryResult)
        {
            $ex = "salary transection fail. Please try again !";
            header("Location:Account?error=$ex");
        }
        else
        {
            $ex = 'salary transection successfully. Here is date: '.$d.' and Salary: '.$totalSalary.'/-';
            header("Location:Account?error=$ex");
        }
    }

    $date = date("Y-m-d");
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
            calculateSalary($date,$Eid,$BasicSalary,$houseRent,$medicalCost,$transport,$Overtime,$OvertimeMoney,$AbsentDay,$AbsentDeduct,$VAT,$PbtFound,$Advance,$remark,$Bonus);
            break;
        // case $BasicSalary <= 25000:
        //     $houseRent = ((125*$BasicSalary)/100)-$BasicSalary;
        //         echo "House Rent is 25%: ".$houseRent.'/-  ';
        //     $medicalCost = ((125*$BasicSalary)/100)-$BasicSalary;
        //         echo " Medical cost is 25%: ".$medicalCost.'/-  ';
        //     $transport = ((125*$BasicSalary)/100)-$BasicSalary;
        //         echo " Transport cost is 25%: ".$transport.'/-  ';
        //     $VAT = ((107*$BasicSalary)/100)-$BasicSalary;
        //         echo " VAT is 7%: ".$VAT.'/-  ';
        //     $PbtFound = ((107*$BasicSalary)/100)-$BasicSalary;
        //         echo " Provident found is 7%: ".$PbtFound.'/-  ';
        //     //function call
        //     echo"Total Salary: ".calculateSalary($BasicSalary,$houseRent,$medicalCost,$transport,$OvertimeMoney, $VAT, $AbsentDeduct, $Advance,$Bonus,$date,$Eid);
        //     break;
        // case $BasicSalary <= 30000:
        //     $houseRent = ((130*$BasicSalary)/100)-$BasicSalary;
        //         echo "House Rent is 30%: ".$houseRent.'/-  ';
        //     $medicalCost = ((130*$BasicSalary)/100)-$BasicSalary;
        //         echo " Medical cost is 30%: ".$medicalCost.'/-  ';
        //     $transport = ((130*$BasicSalary)/100)-$BasicSalary;
        //         echo " Transport cost is 30%: ".$transport.'/-  ';
        //     $VAT = ((108*$BasicSalary)/100)-$BasicSalary;
        //         echo " VAT is 8%: ".$VAT.'/-  ';
        //     $PbtFound = ((108*$BasicSalary)/100)-$BasicSalary;
        //         echo " Provident found is 8%: ".$PbtFound.'/-  ';
        //     //function call
        //     echo"Total Salary: ".calculateSalary($BasicSalary,$houseRent,$medicalCost,$transport,$OvertimeMoney, $VAT, $AbsentDeduct, $Advance,$Bonus,$date,$Eid);
        //     break;
        // case $BasicSalary <= 40000:
        //     $houseRent = ((140*$BasicSalary)/100)-$BasicSalary;
        //         echo "House Rent is 40%: ".$houseRent.'/-  ';
        //     $medicalCost = ((140*$BasicSalary)/100)-$BasicSalary;
        //         echo " Medical cost is 40%: ".$medicalCost.'/-  ';
        //     $transport = ((140*$BasicSalary)/100)-$BasicSalary;
        //         echo " Transport cost is 40%: ".$transport.'/-  ';
        //     $VAT = ((109*$BasicSalary)/100)-$BasicSalary;
        //         echo " VAT is 9%: ".$VAT.'/-  ';
        //     $PbtFound = ((109*$BasicSalary)/100)-$BasicSalary;
        //         echo " Provident found is 9%: ".$PbtFound.'/-  ';
        //     //function call
        //     echo"Total Salary: ".calculateSalary($BasicSalary,$houseRent,$medicalCost,$transport,$OvertimeMoney, $VAT, $AbsentDeduct, $Advance,$Bonus,$date,$Eid);
        //     break;
        // case $BasicSalary <= 50000:
        //     $houseRent = ((150*$BasicSalary)/100)-$BasicSalary;
        //         echo "House Rent is 50%: ".$houseRent.'/-  ';
        //     $medicalCost = ((150*$BasicSalary)/100)-$BasicSalary;
        //         echo " Medical cost is 50%: ".$medicalCost.'/-  ';
        //     $transport = ((150*$BasicSalary)/100)-$BasicSalary;
        //         echo " Transport cost is 50%: ".$transport.'/-  ';
        //     $VAT = ((110*$BasicSalary)/100)-$BasicSalary;
        //         echo " VAT is 10%: ".$VAT.'/-  ';
        //     $PbtFound = ((110*$BasicSalary)/100)-$BasicSalary;
        //         echo " Provident found is 10%: ".$PbtFound.'/-  ';
        //     //function call
        //     echo"Total Salary: ".calculateSalary($BasicSalary,$houseRent,$medicalCost,$transport,$OvertimeMoney, $VAT, $AbsentDeduct, $Advance,$Bonus,$date,$Eid);
        //     break;
        // case $BasicSalary <= 100000:
        //     $houseRent = ((170*$BasicSalary)/100)-$BasicSalary;
        //         echo "House Rent is 70%: ".$houseRent.'/-  ';
        //     $medicalCost = ((170*$BasicSalary)/100)-$BasicSalary;
        //         echo " Medical cost is 70%: ".$medicalCost.'/-  ';
        //     $transport = ((170*$BasicSalary)/100)-$BasicSalary;
        //         echo " Transport cost is 70%: ".$transport.'/-  ';
        //     $VAT = ((115*$BasicSalary)/100)-$BasicSalary;
        //         echo " VAT is 15%: ".$VAT.'/-  ';
        //     $PbtFound = ((115*$BasicSalary)/100)-$BasicSalary;
        //         echo " Provident found is 15%: ".$PbtFound.'/-  ';
        //     //function call
        //     echo"Total Salary: ".calculateSalary($BasicSalary,$houseRent,$medicalCost,$transport,$OvertimeMoney, $VAT, $AbsentDeduct, $Advance,$Bonus,$date,$Eid);
        //     break;
        // default:
        //     echo "Do not increase House rent.";
        //     echo "Do not increase Medical Cost.";
        //     echo "Do not increase Transport.";
    }

    
    
}


// ==================== Salary section end ==================================== //


?>
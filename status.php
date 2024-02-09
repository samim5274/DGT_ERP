<?php

    include 'dbconfig.php';
    session_start();

    if(isset($_SESSION['Id']) && isset($_SESSION['E_Name']))
    {
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permission - <?php echo $_SESSION['E_Name'];?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="status.css" media="screen">
    <link rel="stylesheet" href="button89.css" media="screen">
</head>
<body>

<?php 

/////////////////////////////// page load user found code //////////////////////////////////

    $uname = "".$_SESSION['E_Name'];
    $Id = "".$_SESSION['Id'];
    if($uname && $Id)
    {
        $_SESSION['E_Name'] = $uname;
        $_SESSION['Id'] = $Id;
    }

    $sqlData = "SELECT * FROM tb_employeeinfo WHERE Id = $Id";
    $sqlResult = mysqli_query($conn,$sqlData);
    foreach($sqlResult as $data)
    {
        $sname = $data['E_Name'];
        $sdesig = $data['E_Designation'];
        $sdob = $data['E_DOB'];
        $sgender = $data['E_Gender'];
        $semail = $data['E_Email'];
        $susername = $data['E_Username'];
        $sphone = $data['E_Phone'];
        if($data['E_Status'] == 1)
        {
            $sstatus = "Active";
        }
        else if($data['E_Status'] == 2)
        {
            $sstatus = "De-active";
        }
        else
        {
            $sstatus = "Not applicable";
        }
        $sfatherName = $data['E_FatherName'];
        $smotherName = $data['E_MotherName'];
        $spresentAdrress = $data['E_PresentAddress'];
        $spermanentAddress = $data['E_PermanentAddress'];
        $sEPhone = $data['E_EmargencyPhone'];
        $snationality = $data['E_Nationality'];
        $smarridtalStatus = $data['E_MarritalStatus'];
        $sreligion = $data['E_Religion'];
        $snid = $data['E_NID'];
        $sofficeId = $data['E_OfficeId'];
        $sjoinDate = $data['E_JoinDate'];
        $sbloodGroup = $data['E_BloodGroup'];
        $simage = $data['E_Image'];
        $sId = $data['E_OfficeId'];
        $error = "User are selected!";
    }

/////////////////////////////// user search code //////////////////////////////////

if(isset($_POST['btnSearch']))
{
    if(isset($_POST['cbxStatus']))
    {
        $Sname = $_POST['cbxStatus'];
    }
    else
    {
        $Sname = "";
    }

    if(!$Sname)
    {
        $sId = 'No record found';
        $sname = 'No record found';
        $sdesig = 'No record found';
        $semail = 'No record found';
        $susername = 'No record found';
        $sphone = 'No record found';
        $sstatus = "Not applicable";
        $sdob = 'No record found';
        $sjoinDate = 'No record found';
        $simage = 'No record found';
        $snid = 'No record found';
        $error = "User are not selected. Please select the user name.";
    }
    else
    {
        $sqlSData = "SELECT * FROM tb_employeeinfo WHERE Id = '$Sname'";
        $sqlSResult = mysqli_query($conn,$sqlSData);
        
        if(mysqli_num_rows($sqlSResult) > 0)
        {
            foreach($sqlSResult as $data)
            {
                $sId = $data['E_OfficeId'];
                $sname = $data['E_Name'];
                $sdesig = $data['E_Designation'];
                $semail = $data['E_Email'];
                $susername = $data['E_Username'];
                $sphone = $data['E_Phone'];
                if($data['E_Status'] == 1)
                {
                    $sstatus = "Active";
                }
                else if($data['E_Status'] == 2)
                {
                    $sstatus = "De-active";
                }
                else
                {
                    $sstatus = "Not applicable";
                }
                $sdob = $data['E_DOB'];
                $sjoinDate = $data['E_JoinDate'];
                $simage = $data['E_Image'];
                $snid = $data['E_NID'];
            }
            $error = "User is found successfully";            
        }
        else
        {
            $error = "User is found successfully";
        }
    }
    
}

?>


<section id="searchSection">
    <div class="container">
        <form action="" method="POST">
            <div class="wrapper2">
                <div class="row">

                    <!-- <?php if(isset($_GET['error'])){ ?> <p class="error text-center text-dark mark"><?php echo $_GET['error']; ?></p> <?php } ?> -->
                    <p class="error text-center text-dark mark"><?php echo $error; ?></p>
                    
                    <div class="col-md-10">
                        <!-- <input type="text" name="txtSearch" class="form-control" placeholder="Search..."> -->
                        <select name="cbxStatus" class="form-control mt-2" id="Status">
                            <?php 
                                $sqlData = "SELECT * FROM tb_employeeinfo";
                                $sqlResult = mysqli_query($conn,$sqlData);
                            ?>
                            <option selected disabled>Select Status</option>
                            <?php while($row = mysqli_fetch_array($sqlResult)){?>
                            <option value="<?php echo $Sname = $row['Id']; ?>"><?php echo $row['E_Name']; ?></option>
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
</section>



<section id="statusPermission">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="wrapper">
                    <a href="profil"><button class="button-30"><i class="fa fa-angle-double-left"> Back</i></button></a>
                    <div class="text-center mb-4"><img src="img/logo3.png" alt="Logo not found..."></div>                
                    <div class="logo">
                        <img src="P_Pic/<?php echo $simage;?>" alt="Photo not found...">
                    </div>
                    <div class="text-center mt-4 name">
                        <?php echo $sname;?>
                    </div>
                    <div class="text-center">
                        <p><?php echo $sdesig;?></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-4"><p>ID: </p></div>
                                <div class="col-8"><p><?php echo $sId;?></p></div>
                            </div>
                            <div class="row">
                                <div class="col-4"><p>Join Date: </p></div>
                                <div class="col-8"><p><?php echo $sjoinDate;?></p></div>
                            </div>
                            <div class="row">
                                <div class="col-4"><p>Phone: </p></div>
                                <div class="col-8"><p><?php echo $sphone;?></p></div>
                            </div>
                            <div class="row">
                                <div class="col-4"><p>Date of birth: </p></div>
                                <div class="col-8"><p><?php echo $sdob;?></p></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-4"><p>Email: </p></div>
                            <div class="col-8"><p><?php echo $semail;?></p></div>
                            </div>
                            <div class="row">
                                <div class="col-4"><p>Username: </p></div>
                                <div class="col-8"><p><?php echo $susername;?></p></div>
                            </div>
                            <div class="row">
                                <div class="col-4"><p>NID: </p></div>
                                <div class="col-8"><p><?php echo $snid;?></p></div>
                            </div>
                            <div class="row">
                                <div class="col-4"><p>Status: </p></div>
                                <div class="col-8"><p><?php echo $sstatus;?></p></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <form action="userCreateBK" method="POST">
                        <div class="row">
                            <div class="col">
                                <label class="labels" for="Status">Employee Status</label>
                                <div class="col-8"><input type="text" hidden name="txtId" value="<?php echo $sId;?>"></div>
                                <div class="col-8"><input type="text" hidden name="txtName" value="<?php echo $sname;?>"></div>
                                <?php if(isset($_GET['error'])){ ?> <p class="error text-center text-dark mark"><?php echo $_GET['error']; ?></p> <?php } ?>
                                <select name="cbxStatus1" class="form-control mt-2" id="Status">
                                    <option selected disabled>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">De-active</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col text-center">
                                <button name="btnStatusUpdate" type="submit" class="button-30">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    
</body>
</html>

<?php 

    }
    else{
        header("Location: log.php");
        exit();
    }

?>
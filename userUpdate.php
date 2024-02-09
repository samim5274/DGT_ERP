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
    <title>Profile - <?php echo $_SESSION['E_Name'];?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="userUpdate.css" media="screen">
</head>
<body>

<?php 
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
        $name = $data['E_Name'];
        $desig = $data['E_Designation'];
        $dob = $data['E_DOB'];
        $gender = $data['E_Gender'];
        $email = $data['E_Email'];
        $username = $data['E_Username'];
        $phone = $data['E_Phone'];
        if($data['E_Status'] == 1)
        {
            $status = "Active";
        }
        else if($data['E_Status'] == 2)
        {
            $status = "De-active";
        }
        else
        {
            $status = "Not applicable";
        }
        $fatherName = $data['E_FatherName'];
        $motherName = $data['E_MotherName'];
        $presentAdrress = $data['E_PresentAddress'];
        $permanentAddress = $data['E_PermanentAddress'];
        $EPhone = $data['E_EmargencyPhone'];
        $nationality = $data['E_Nationality'];
        $marridtalStatus = $data['E_MarritalStatus'];
        $religion = $data['E_Religion'];
        $nid = $data['E_NID'];
        $officeId = $data['E_OfficeId'];
        $joinDate = $data['E_JoinDate'];
        $bloodGroup = $data['E_BloodGroup'];
        $image = $data['E_Image'];
    }
?>

<div id="profil-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="wrapper">
                    <div class="text-center mb-4"><img src="img/logo3.png" alt="Logo not found..."></div>                
                    <div class="logo">
                        <img src="P_Pic/<?php echo $image;?>" alt="Logo not found...">
                    </div>
                    <div class="text-center mt-4 name">
                    <?php echo $name;?>
                    </div>
                    <div class="text-center">
                        <p><?php echo $desig;?></p>
                    </div>
                    <p class="pt-3">ID: <?php echo $officeId;?></p>
                    <p class="">Blood Group: <?php echo $bloodGroup;?></p>
                    <p class="">Join Date: <?php echo $joinDate;?></p>
                    <p class="">Phone: 0<?php echo $phone;?></p>
                    <!-- <p class="">Status: <?php echo $status;?></p> -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="wrapper">
                <form action="userCreateBK" method="POST" enctype="multipart/form-data">
                    <h2 class="text-center mb-4">Personal Information</h2>
                    <?php if(isset($_GET['error'])){ ?> <p class="error text-center text-danger mark"><?php echo $_GET['error']; ?></p> <?php } ?>
                    <div class="row">
                        <div class="col-sm-4"><p class="title1">Full Name</p></div>
                        <!-- <div class="col-8"><p><?php echo $name;?></p></div> -->
                        <div class="col-sm-8"><input type="text" class="form-control" name="txtFirstName" placeholder="Full name"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><p>Father Name</p></div>
                        <!-- <div class="col-8"><p><?php echo $fatherName;?></p></div> -->
                        <div class="col-sm-8"><input type="text" class="form-control" name="txtFatherName" placeholder="Father name"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><p>Mother Name</p></div>
                        <!-- <div class="col-8"><p><?php echo $motherName;?></p></div> -->
                        <div class="col-sm-8"><input type="text" class="form-control" name="txtMotherName" placeholder="Mother name"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><p>Date of birth</p></div>
                        <!-- <div class="col-8"><p><?php echo $dob;?></p></div> -->
                        <div class="col-sm-8"><input type="date" class="form-control" name="dtpDOB"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><p>Present Address</p></div>
                        <!-- <div class="col-8"><p><?php echo $presentAdrress;?></p></div> -->
                        <div class="col-sm-8"><input type="text" class="form-control" name="txtPresentAddress" placeholder="Present address"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><p>Permanent Address</p></div>
                        <!-- <div class="col-8"><p><?php echo $permanentAddress;?></p></div> -->
                        <div class="col-sm-8"><input type="text" class="form-control" name="txtPermanentAddress" placeholder="Permanent address"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><p>E-mail</p></div>
                        <!-- <div class="col-8"><p><?php echo $email;?></p></div> -->
                        <div class="col-sm-8"><input type="text" class="form-control" name="txtEmail" placeholder="example@example.com"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><p>Username</p></div>
                        <!-- <div class="col-8"><p><?php echo $username;?> (You cann't change username)</p></div> -->
                        <div class="col-sm-8"><input disabled type="text" class="form-control" name="txtUsername" value="<?php echo $username;?>"></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4"><p>Emargency</p></div>
                        <!-- <div class="col-8"><p><?php echo $EPhone;?></p></div> -->
                        <div class="col-sm-8"><input type="text" class="form-control" name="txtEPhone" placeholder="Phone"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><p>Nationality</p></div>
                        <!-- <div class="col-8"><p><?php echo $nationality;?></p></div> -->
                        <div class="col-sm-8"><input type="text" class="form-control" name="txtNationality" placeholder="Nationality"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><p>Marrital Status</p></div>
                        <!-- <div class="col-8"><p><?php echo $marridtalStatus;?></p></div> -->
                        <div class="col-sm-8">
                            <select name="cbxMarritalStatus" class="form-control" id="MarritalStatus">
                            <option selected disabled>Select Marrital Status</option>
                            <option value="Married">Married</option>
                            <option value="Un-married">Un-married</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><p>Religion</p></div>
                        <!-- <div class="col-8"><p><?php echo $religion;?></p></div> -->
                        <div class="col-sm-8"><input type="text" class="form-control" name="txtRelisigon" placeholder="Religion"></div>
                    </div>
                    <div class="text-center my-4">
                        <button class="button-30" type="submit" name="btnUpdate">Update</button>
                    </div>
                </form>
                <div class="text-center my-4">
                        <a href="index"><button class="button-30">Home</button></a>
                        <a href="profil"><button class="button-30">Cancel</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




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
<?php

include 'dbconfig.php';
session_start();

if(isset($_POST['btnSubmit']))
{
    $name = $_POST['txtFirstName'] .' '. $_POST['txtLasttName'];
    $desig = $_POST['cbxDesignation'];
    $dob = $_POST['dtpDOB'];
    $gender = $_POST['cbxGender'];
    $email = $_POST['txtEmail'];
    $username = $_POST['txtUsername'];
    $pass = $_POST['txtPassword'];
    $password = $_POST['txtRePassword'];
    $phone = $_POST['txtPhone'];
    $fatherName = $_POST['txtFatherName'];
    $motherName = $_POST['txtMotherName'];
    $presentAdrress = $_POST['txtPresentAddress'];
    $permanentAddress = $_POST['txtPermanentAddress'];
    $EPhone = $_POST['txtEPhone'];
    $nationality = $_POST['txtNationality'];
    $marridtalStatus = $_POST['cbxMarritalStatus'];
    $religion = $_POST['txtRelisigon'];
    $nid = $_POST['txtNID'];
    $officeId = $_POST['txtOfficeId'];
    $joinDate = $_POST['dtpJoinDate'];
    $bloodGroup = $_POST['txtBlooadGroup'];

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if($error === 0)
        {
            if($img_size > 1250000)
            {
                $ex="Picture size to big!";
                header("Location: addProduct.php?error=$ex");
            }
            else
            {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg","jpeg","png","webp");
                if(in_array($img_ex_lc, $allowed_exs))
                {
                    $img_new_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_up_path = "P_Pic/".$img_new_name;
                    move_uploaded_file($tmp_name, $img_up_path);
                }
                else
                {
                    $ex="Extention not allowed!";
                    header("Location: product.php?error=$ex");
                }
            }
            
        }
        else
        {
            $ex = "Unknown error found. Please select good picture.";
            header("Location: product.php?error=$ex");
        }



    if($desig || $gender || $marridtalStatus) 
    {
        if($name && $username && $password && $email)
        {
            $sqlSearch = "SELECT * FROM tb_employeeinfo WHERE E_Username LIKE '%$username%'";
            $sqlSearchResult = mysqli_query($conn,$sqlSearch);
            while($row = mysqli_fetch_array($sqlSearchResult)){
            $UN = $row["E_Username"];
            } 
            if($username == $UN)
            {
                $ex="Username already taken. Please try to different username.";
                header("Location: userCreate.php?error=$ex");
            }
            else
            {
                if($pass == $password)
                {
                    $sqlInsert = "INSERT INTO tb_employeeinfo( `E_Name`, `E_Designation`, `E_Username`, `E_DOB`, `E_Gender`, `E_Email`, `E_Password`, `E_Phone`, `E_FatherName`, `E_MotherName`, `E_PresentAddress`, `E_PermanentAddress`, `E_EmargencyPhone`, `E_Nationality`, `E_MarritalStatus`, `E_Religion`, `E_NID`, `E_OfficeId`, `E_JoinDate`, `E_BloodGroup`,`E_Image`) VALUES ('$name','$desig','$username','$dob','$gender','$email','$password','$phone','$fatherName','$motherName','$presentAdrress','$permanentAddress','$EPhone','$nationality','$marridtalStatus','$religion','$nid','$officeId','$joinDate','$bloodGroup','$img_new_name')";

                    $sqlResult = mysqli_query($conn,$sqlInsert);
                    $ex="New user create successfully.";
                    header("Location: userCreate.php?error=$ex");
                }
                else
                {
                    $ex="Password cann't not match. Please fill the same password & try again. Thank you!";
                    header("Location: userCreate.php?error=$ex");
                }
            }
        }
        else
        {
            $ex="Please fill up the full name, username, password and email. Thank you!";
            header("Location: userCreate.php?error=$ex");
        }
    }
    else
    {
        $ex="Please fill up the full name, username, password and email. Thank you!";
        header("Location: userCreate.php?error=$ex");
    }
}

/////////////////////////Profile infomartion update///////////////////////////////////////////////////


if(isset($_POST['btnUpdate']))
{
    $uname = "".$_SESSION['E_Name'];
    $Id = "".$_SESSION['Id'];
    if($uname && $Id)
    {
        $_SESSION['E_Name'] = $uname;
        $_SESSION['Id'] = $Id;
    }

    $name = $_POST['txtFirstName'] .' '. $_POST['txtLasttName'];
    $desig = $_POST['cbxDesignation'];
    $dob = $_POST['dtpDOB'];
    $gender = $_POST['cbxGender'];
    $email = $_POST['txtEmail'];
    $username = $_POST['txtUsername'];
    $pass = $_POST['txtPassword'];
    $password = $_POST['txtRePassword'];
    $phone = $_POST['txtPhone'];
    $fatherName = $_POST['txtFatherName'];
    $motherName = $_POST['txtMotherName'];
    $presentAdrress = $_POST['txtPresentAddress'];
    $permanentAddress = $_POST['txtPermanentAddress'];
    $EPhone = $_POST['txtEPhone'];
    $nationality = $_POST['txtNationality'];
    $marridtalStatus = $_POST['cbxMarritalStatus'];
    $religion = $_POST['txtRelisigon'];
    $nid = $_POST['txtNID'];
    $officeId = $_POST['txtOfficeId'];
    $joinDate = $_POST['dtpJoinDate'];
    $bloodGroup = $_POST['txtBlooadGroup'];

    $sqlUpdate = "UPDATE tb_employeeinfo SET E_Name = '$name', E_Username='$username',E_DOB='$dob', E_Gender='$gender', E_Email='$email',E_FatherName='$fatherName', E_MotherName='$motherName', E_PresentAddress='$presentAdrress', E_PermanentAddress='$permanentAddress',E_EmargencyPhone='$EPhone', E_Nationality='$nationality', E_MarritalStatus='$marridtalStatus', E_Religion='$religion' WHERE Id = '$Id'";

    $sqlUpdateResult = mysqli_query($conn,$sqlUpdate);

    if($sqlUpdateResult)
    {
        $ex="User information update successfully.";
        header("Location: profil.php?error=$ex");
    }
    else
    {
        $ex="1 User information update un-successfully.".$conn->error;
        header("Location: profil.php?error=$ex");
    }
}

/////////////////////////User status permission///////////////////////////////////////////////////

// if(isset($_POST['btnStatusUpdate']))
// {
//     $uname = "".$_SESSION['E_Name'];
//     $Id = "".$_SESSION['Id'];
//     if($uname && $Id)
//     {
//         $_SESSION['E_Name'] = $uname;
//         $_SESSION['Id'] = $Id;
//     }

//     $UpStatus=$_POST['cbxStatus'];
//     if($UpStatus === 0 || !$UpStatus)
//     {
//         $ex="Your selected employee ($uname) are not applicable.You must be select the employee status.";
//         header("Location: status.php?error=$ex");
//     }
//     else
//     {
//         $sqlUpdate2 = "UPDATE tb_employeeinfo SET E_Status = '$UpStatus' WHERE Id = '$Id'";
//         $sqlUpdateResult = mysqli_query($conn,$sqlUpdate2);

//         if($sqlUpdateResult)
//         {
//             if($UpStatus == 1)
//             {
//                 $status = "Active";
//             }
//             else if($UpStatus == 2)
//             {
//                 $status = "De-active";
//             }
//             else
//             {
//                 $status = "Not applicable";
//             }
//             $ex="User ($uname) status ($status) update successfully";
//             header("Location: status.php?error=$ex");
//         }
//         else
//         {
//             $ex="User information update un-successfully.".$conn->error;
//             header("Location: status.php?error=$ex");
//         }
//     }
// }

if(isset($_POST['btnStatusUpdate']))
{
    $UpStatus = $_POST['cbxStatus1'];
    $IdS = $_POST['txtId'];
    $uname = $_POST['txtName'];

    if($UpStatus === 0 || !$UpStatus)
    {
        $ex="Your selected employee are not applicable.You must be select the employee status.";
        header("Location: status.php?error=$ex");
    }
    else
    {
        $sqlUpdate2 = "UPDATE tb_employeeinfo SET E_Status = '$UpStatus' WHERE E_OfficeId = '$IdS'";
        $sqlUpdateResult = mysqli_query($conn,$sqlUpdate2);

        if(!$sqlUpdateResult)
        {
            $ex = "User information update un-successfully.";
            header("Location: status.php?error=$ex");
        }
        else
        {
            if($UpStatus == 1)
            {
                $status = "Active";
            }
            else if($UpStatus == 2)
            {
                $status = "De-active";
            }
            else
            {
                $status = "Not applicable";
            }
            $ex = "User ($uname) status ($status) update successfully";
            header("Location: status.php?error=$ex");
        }
    }
}


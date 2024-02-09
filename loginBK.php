<?php

include 'dbconfig.php';
session_start();

    $uName = $_POST['username'];
    $Pass = $_POST['password'];
    $status = 1;

    if(empty($uName)){
        header("Location: log.php?error=User name or mail is empty. Please fill the username or mail and try again!");
        exit();
    }
    if(empty($Pass)){
        header("Location: log.php?error=Your password is empty. Please fill the password and try again!");
        exit();
    }

    $sqlData = "SELECT * FROM tb_employeeinfo WHERE E_Username = '$uName' AND E_Password = '$Pass'";

    $sqlResult = mysqli_query($conn,$sqlData);

    if(mysqli_num_rows($sqlResult) === 1)
    {
        $row = mysqli_fetch_assoc($sqlResult);
        if($row['E_Username'] === $uName && $row['E_Password'] === $Pass)
        {
            if($row['E_Status'] == $status)
            {
                $_SESSION['E_Name'] = $row['E_Name'];
                $_SESSION['Id'] = $row['Id'];
                header("Location: index.php?error=Login successfully.");
                exit();
            }
            else
            {
                header("Location: log.php?error=You don't have login permission. Please contact with Deegautex managment authority!");
                exit();
            }
        }
        else
        {
            header("Location: log.php?error=User name and password invalid. Please try again!");
            exit();
        }
    }
    else
    {
        header("Location: log.php?error=User name and password invalid. Please try again!!");
        exit();
    }

?>
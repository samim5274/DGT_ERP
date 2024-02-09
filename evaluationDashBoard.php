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
        $evalueationData = 1;
        $sqlEvalueation = "SELECT * FROM tb_employeeinfo WHERE Id = $Id AND E_EvaluationPermission = $evalueationData";
        $sqlEvalueationResult = mysqli_query($conn,$sqlEvalueation);
        $row = mysqli_fetch_assoc($sqlEvalueationResult);
        if($row['E_EvaluationPermission'] == $evalueationData)
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

    <link rel="stylesheet" href="styleProductFilter.css" media="screen">
    <link rel="stylesheet" href="evalutionDashboardStyle.css">

</head>
<body>

<?php include 'menuBar.php'; ?>
<br>

<section id="searchSection">
    <div class="container">
        <form action="" method="POST">
            <div class="wrapper2">
                <div class="row">
                    <label class="labels" for="designation">Department</label><hr>
                    <div class="col-md-10">
                        <select name="cbxDepartment" class="form-control" id="designation">
                            <?php 
                                $sqlData = "SELECT * FROM tb_department";
                                $sqlResult = mysqli_query($conn,$sqlData); ?>
                            <option selected disabled>Select Designation</option>
                            <?php while($row = mysqli_fetch_array($sqlResult)){?>
                            <option value="<?php echo $depId = $row['dep_id']; ?>"><?php echo $row['dep_Name']; ?></option>
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



<section id="productInfo">
    <div class="container">
        <div class="row">
            <?php 
            if(isset($_POST['btnSearch']))
            {
                if(isset($_POST['cbxDepartment']))
                {
                    $did = $_POST['cbxDepartment'];
                }
                else
                {
                    $did = '';
                }

                if(!$did)
                {
                    $error = 'DEPARTMENT not selected. Please select DEPARTMENT and try again.';?>
                    <p class="error text-center text-dark mark"><?php echo $error; ?></p><?php
                }
                else
                {
                    $sqlData = "SELECT * FROM tb_employeeinfo WHERE E_dep_id = '$did'";
                    $sqlResult = mysqli_query($conn,$sqlData);
                    
                    foreach($sqlResult as $val){ ?>

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

            <?php   }
            } }
            ?>
            
        </div>
    </div>
 </section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    
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
            exit("Note:- You do not have permission visit evaludation page. Please go back! or If you can access the evaluation page, please contact with Deegautex authority. Thank you ! !! !!!");
        }
    }
    else{
        header("Location: log.php");
        exit();
    }

?>
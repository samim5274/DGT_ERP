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
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Details</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="styleProductFilter.css" media="screen">

</head>
<body>

<?php 

include 'menuBar.php'; 

if(isset($_GET['id']))
{
    $Eid = $_GET['id'];
}
else
{
    $Eid = '';
}


$sqlData = "SELECT * FROM tb_employeeinfo WHERE Id = '$Eid'";
$sqlResult = mysqli_query($conn,$sqlData);
foreach($sqlResult as $val){
    $name = $val['E_Name'];
    $JDate = $val['E_JoinDate'];
    $desig = $val['E_Designation'];
    $dep = $val['E_dep_id'];
}

$totalPoint = "SELECT SUM(mark) FROM `tb_evaluation` WHERE employee_Id = '$Eid'";
$PointResult = mysqli_query($conn,$totalPoint);
while($row = mysqli_fetch_array($PointResult))
{
    $point = $row['SUM(mark)'];
}

?>


<section>
    <div class="container">
        <div class="row mt-3">
            <div class="col-6">
                <form action="" method="POST">
                    <select name="cbxSkill" class="form-control" id="skill">
                        <?php 
                            $sqlData = "SELECT * FROM tb_skill";
                            $sqlResult = mysqli_query($conn,$sqlData); 
                            ?>
                        <option selected disabled>Select skill Name</option>
                        <?php while($row = mysqli_fetch_array($sqlResult)){?>
                        <option value="<?php echo $sId = $row['id']; ?>"><?php echo $row['skill_Name']; ?></option>
                        <?php } ?>
                    </select>
                    <button name="btnSearch" type="submit" class="button-30 mt-3">Search</button>
                </form>
            </div>
            <div class="col-6">
                <label for="">Name: <?php echo $name;?> / Total Point: <?php echo $point;?></label><br>
                <label for="">Designation: <?php echo $desig;?></label>
                <label for=""> / Join Date: <?php echo $JDate;?></label>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php 
                if(isset($_POST['btnSearch']))
                {
                    if(isset($_POST['cbxSkill']))
                    {
                        $sId = $_POST['cbxSkill'];
                    }
                    else
                    {
                        $sId = '';
                    }

                    if(!$sId)
                    {
                        $error = 'SKILL are not selected. Please select first SKILL and try again.';?>
                        <p class="error text-center text-dark mark"><?php echo $error; ?></p><?php
                    }
                    else
                    {
                        ?>
                        <form action="testEvaluation?id=<?php echo $Eid;?>" method="POST"><?php
                            $sqlData = "SELECT * FROM `tb_mark` WHERE skill_Id = '$sId'";
                            $sqlResult = mysqli_query($conn,$sqlData);?>
                            <select name="cbxMark" class="form-control mt-4" id="mark">
                            <option selected disabled>Select Analysis Name</option><?php
                            foreach($sqlResult as $val){ ?>
                            <option value="<?php echo $mId = $val['id']; ?>"><?php echo $val['Analysis_Name']; ?></option>
                            <?php   }
                            if(isset($_POST['cbxMark']))
                            {
                                $mId = $_POST['cbxMark'];
                            }
                            else
                            {
                                $mId = '';
                            }
                            ?>
                        
                        <input type="number" step="0.01" name="txtmark" placeholder="Enter your mark" class="form-control mt-4">
                        <textarea class="form-control mt-4" name="txtComment" placeholder="Enter your comment !" rows="3"></textarea>
                        <button name="btnAdd" type="submit" class="button-30 mt-3 px-4">Add</button>
                        </form>
                        
                <?php    } ?>
            </div>
        <?php    }
    ?>
        <div class="col-md-6">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Analysis Name</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Mark</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sqlDataShow = "SELECT * FROM `tb_evaluation` WHERE employee_Id = '$Eid'";
                    $SQLRESULTSHOW = mysqli_query($conn, $sqlDataShow);
                    $i=1;
                    foreach($SQLRESULTSHOW as $row){?>
                        <tr>
                        <th scope="row"><?=$i;?></th>
                        <?php $m2Id = $row['mark_Id'];?>
                            <?php
                                $sqlCData = "SELECT mrk.Analysis_Name FROM `tb_mark` AS mrk WHERE id=$m2Id";
                                $sqlCResult = mysqli_query($conn,$sqlCData);
                                foreach($sqlCResult as $re)
                                {?>
                                    <td><?=$re['Analysis_Name'];?></td>
                            <?php    }
                            ?>
                            <td><?php echo $row['comment'];?></td>
                            <td class="text-center"><?php echo $row['mark'];?></td>
                        </tr>
                <?php  $i++;  }
                ?>
                
            </tbody>
            </table>
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
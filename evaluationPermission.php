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

//include 'menuBar.php'; 

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

?>

 <section id="evaluationPermission" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col display-4 text-center text-dark mb-4"><h2>Evaluation Details</h2></div>
        </div>
        <div class="row">
            <div class="col-3"><p>Employee Name : <?php echo $name;?></p></div>
            <div class="col-3"><p>Designation : <?php echo $desig;?></p></div>
            <div class="col-3"><p>Join Date : <?php echo $JDate;?></p></div> 
            <div class="col-3"><p><?php echo "Today : ".date("Y/m/d");?></p></div> 
        </div>
    </div>
 </section>

 <section id="searchSection">
    <div class="container">
        <form action="" method="POST">
            <div class="wrapper2">
                <div class="row">
                    <label class="labels mt-4" for="designation">Skill</label><hr>
                    <div class="col-md-10">
                        <select name="cbxSkill" class="form-control" id="designation">
                            <?php 
                                $sqlData = "SELECT * FROM tb_skill";
                                $sqlResult = mysqli_query($conn,$sqlData); ?>
                            <option selected disabled>Select Designation</option>
                            <?php while($row = mysqli_fetch_array($sqlResult)){?>
                            <option value="<?php echo $sId = $row['id']; ?>"><?php echo $row['skill_Name']; ?></option>
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
        $error = 'SKILL not selected. Please select SKILL SECTION and try again.';?>
        <p class="error text-center text-dark mark"><?php echo $error; ?></p><?php
    }
    else{
        $sqlData = "SELECT * FROM tb_mark WHERE skill_Id = '$sId'";
        $sqlResult = mysqli_query($conn,$sqlData);
        while($row = mysqli_fetch_array($sqlResult)){ ?>
            <div class="container">
                <div class="row mb-4">
                    <div class="col">
                        <label for="" class="form-label mt-3"><?php echo $row['Analysis_Name'];?></label>
                        <input type="number" class="form-control mt-2" id="" placeholder="Enter mark">
                        <textarea class="form-control mt-2" id="" rows="3" placeholder="Enter your comment"></textarea>
                    </div>
                </div>
            </div>
       <?php }
    }
    
 }
    
?>




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
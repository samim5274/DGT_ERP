<?php 

include 'dbconfig.php';

try{
    if(isset($_GET['id']))
    {
        $eId = $_GET['id'];
    }
    else
    {
        $eId = '';
    }
    
    $mark = $_POST['txtmark'];
    $comment = $_POST['txtComment'];
    $mId = $_POST['cbxMark'];
    $day = date('Y/m/d');
    
    $sqlData = "INSERT INTO `tb_evaluation`(`mark_Id`, `mark`, `employee_Id`, `E_date`, `comment`) VALUES ('$mId','$mark','$eId','$day','$comment')";
    $sqlResult = mysqli_query($conn,$sqlData);
    header("Location: evaluationMarkSubmite?id=$eId");
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }

?>
<?php

include 'dbconfig.php';

$id = $_POST['id'];
$sql = "SELECT * FROM `tb_mark` WHERE skill_Id = $id";
$result = mysqli_query($conn, $sql);

$out = '';
while($row = mysqli_fetch_assoc($result)){
    $out .='<option>'.$row['Analysis_Name'].'</option>';
}
echo $out;
?>
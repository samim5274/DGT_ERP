<?php 

include 'dbconfig.php';

$num_per_page = 3;
$i=1;
if(isset($_GET["pages"]))
{
    $pages=$_GET["pages"];
}
else
{
    $pages=1;
}

$start_from=($pages-1)*3;

$sqlData = "SELECT * FROM `tb_employeeinfo` limit $start_from, $num_per_page";
$sqlResult = mysqli_query($conn,$sqlData);

$sql = "SELECT * FROM tb_employeeinfo";
$res = mysqli_query($conn,$sql);
$total_record = mysqli_num_rows($res);
$total_pages = ceil($total_record/$num_per_page);
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="salary.css"  media="screen">
    <link rel="stylesheet" href="styleProductFilter.css">
</head>
<body>


<section id="salary-section" class="bg-secondary text-light">
    <div class="container">
        <div class="row">
            <table class="table table-bordered text-light text-center  mt-4">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    foreach($sqlResult as $row)
                    {?>
                    <tr>
                        <th><?php echo $i;?></th>
                        <td><?php echo $row['E_Name'];?></td>
                        <td><?php echo $row['E_Designation'];?></td>
                        <td><?php echo $row['E_DOB'];?></td>
                        <td><?php echo $row['E_Gender'];?></td>
                        <td><?php echo $row['E_Email'];?></td>
                        <td><?php echo $row['E_Phone'];?></td>
                        <?php $i++; }  ?>
                    </tr>
                </tbody>
            </table>
            
            
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?pages=1">First</a></li>
    <li class="page-item">
    <?php
        if(isset($_GET['pages']) && $_GET['pages'] > 1){
            ?>
            <a class="page-link" href="?pages= <?php echo $_GET['pages'] - 1; ?> "><span aria-hidden="true">&laquo;</span></a>
            <?php
        }else{
            ?>
                <a class="page-link"><span aria-hidden="true">&#8653;</span></a>
            <?php 
        }
    ?>
    </li>
    <?php
    for($i=1;$i<=$total_pages; $i++){
        ?><li class="page-item"><a class="page-link" href="?pages=<?php echo $i; ?>"><?php echo $i; ?></a></li><?php
    }
    ?>    
    <li class="page-item">
    <?php
        if(!isset($_GET['pages'])){
            ?>
            <a class="page-link" href="?pages=2"><span aria-hidden="true">&raquo;</span></a>
            <?php
        }else{
            if($_GET['pages']>=$total_pages){
                ?>
                <a class="page-link"><span aria-hidden="true">&#8655;</span></a>
                <?php
            }else{
                ?>
                <a class="page-link" href="?pages=<?php echo $_GET['pages'] + 1; ?>"><span aria-hidden="true">&raquo;</span></a>
                <?php
            }
        }
    ?>
    </li>
    <li class="page-item"><a class="page-link" href="?pages=<?php echo $total_pages; ?>">Last</a></li>
  </ul>
</nav>

<div class="page-info">
    <?php 
    if(!isset($_GET['pages'])){
        $page = 1;
    }
    else{
        $page = $_GET['pages'];
    }
    ?>
    <p>showing <?php echo $page ?>  of <?php echo $total_pages;?> pages </p>
</div>

        </div>
    </div>
</section>




<!--
    <div class="page-info">
    <?php 
    if(!isset($_GET['pages'])){
        $page = 1;
    }
    else{
        $page = $_GET['pages'];
    }
    ?>
    showing <?php echo $page ?>  of <?php echo $total_pages;?> pages 
</div>

    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?pages=1">First</a></li>
    <li class="page-item">
    <?php
        if(isset($_GET['pages']) && $_GET['pages'] > 1){
            ?>
            <a class="page-link" href="?pages= <?php echo $_GET['pages'] - 1; ?> "><span aria-hidden="true">&laquo;</span></a>
            <?php
        }else{
            ?>
                <a class="page-link"><span aria-hidden="true">&laquo;</span></a>
            <?php 
        }
    ?>
    </li>
    <?php
    for($i=1;$i<=$total_pages; $i++){
        ?><li class="page-item"><a class="page-link" href="?pages=<?php echo $i; ?>"><?php echo $i; ?></a></li><?php
    }
    ?>    
    <li class="page-item">
    <?php
        if(!isset($_GET['pages'])){
            ?>
            <a class="page-link" href="?pages=2"><span aria-hidden="true">&raquo;</span></a>
            <?php
        }else{
            if($_GET['pages']>=$total_pages){
                ?>
                <a class="page-link"><span aria-hidden="true">&raquo;</span></a>
                <?php
            }else{
                ?>
                <a class="page-link" href="?pages=<?php echo $_GET['pages'] + 1; ?>"><span aria-hidden="true">&raquo;</span></a>
                <?php
            }
        }
    ?>
    </li>
    <li class="page-item"><a class="page-link" href="?pages=<?php echo $total_pages; ?>">Last</a></li>
  </ul>
</nav>
-->


<!-- <div class="pagination">

    <a href="?pages=1">First</a>

    <?php
        if(isset($_GET['pages']) && $_GET['pages'] > 1){
            ?>
            <a href="?pages= <?php echo $_GET['pages'] - 1 ?> ">Previows</a>
            <?php
        }else{
            ?>
                <a>Previows</a>
            <?php 
        }
    ?> 

    <div class="page-number">
        <?php
        for($i=1;$i<=$total_pages; $i++){
            ?><a href="?pages=<?php echo $i; ?>"><?php echo $i; ?></a><?php
        }
        ?>
        
    </div>

    <?php
        if(!isset($_GET['pages'])){
            ?>
            <a href="?pages=2">Next</a>
            <?php
        }else{
            if($_GET['pages']>=$total_pages){
                ?>
                <a>Next</a>
                <?php
            }else{
                ?>
                <a href="?pages=<?php echo $_GET['pages'] + 1; ?>">Next</a>
                <?php
            }
        }
    ?>

    <a href="?pages=<?php echo $total_pages; ?>">Last</a>

</div> -->





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>
</html>
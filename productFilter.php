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
    <title>Deegautex - Product List</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="styleProductFilter.css" media="screen">

</head>
<body>
<?php include 'menuBar.php'; ?>
<br>

<div class="text-center container">
    <div class="row">
        <div class="col-3"><a href="product"><button class="button-30 mt-4" role="button">< Back</button></a></div>
        <div class="col-6"><h3 class="display-3">Product Information</h3></div>
        <div class="col-3"></div>
    </div>
</div><br>

<!-- Product info section start -->
<!-- <section id="productInfo-section">
    <div class="container">
        <div class="row">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Catagory</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <?php
                
                    $sqlData = "SELECT * FROM tb_productinfo";
                    $i=1;
                    $sqlResult = mysqli_query($conn,$sqlData);
                ?>
                <tbody>
                    <?php $i=1; foreach($sqlResult as $val) 
                    {?>
                    <tr>
                        <th scope="row"><?=$i;?></th>
                        <td><?=$val['P_Name'];?></td>
                        <?php $cid = $val['P_Cat_Id'];?>
                        <?php
                        $sqlCData = "SELECT cat.C_name FROM `tb_catagoryinfo` AS cat WHERE Id=$cid";
                            $sqlCResult = mysqli_query($conn,$sqlCData);
                            foreach($sqlCResult as $re)
                            {?>
                                <td><?=$re['C_name'];?></td>
                        <?php    }
                        ?>
                        <td>৳<?=$val['P_Price'];?>/-</td>
                    </tr> <?php $i++; } ?>
                </tbody>

                    <th scope="col"></th>
                    <th scope="col"></th>
                    <?php
                    $totalAmount = "SELECT sum(P_Price) FROM tb_productinfo";
                    $sqlTotalAmountResult = mysqli_query($conn,$totalAmount);
                    while($row = mysqli_fetch_array($sqlTotalAmountResult))
                    {
                        ?><th scope="col">Total Price</th>
                        <th scope="col"><?php echo $row['sum(P_Price)']; ?></th>
                <?php    }    ?>
            </table>
        </div>
    </div> -->
</section>
 <!--Product info section end -->






<!-- test slice section product name show  -->

<div class="content">
    <p id="pp"></p>
</div>










 <!--product pagination start -->

<?php 
$num_per_page = 6;
$i=1;
$total_value=0;
if(isset($_GET["pages"]))
{
    $pages = $_GET["pages"];
}
else
{
    $pages=1;
}

$start_from = ($pages-1)*$num_per_page;

$sqlData = "SELECT * FROM tb_productinfo LIMIT $start_from, $num_per_page";
$sqlResult = mysqli_query($conn,$sqlData);

$sql = "SELECT * FROM tb_productinfo";
$result = mysqli_query($conn,$sql);
$total_record = mysqli_num_rows($result);
$total_pages = ceil($total_record/$num_per_page);

?>
<table class="table table-bordered text-center">
<thead>
    <tr>
        <th scope="col">SL</th>
        <th scope="col">Product Name</th>
        <th scope="col">Catagory</th>
        <th scope="col">Price</th>
    </tr>
</thead>

<tbody>
    <?php $i=1; foreach($sqlResult as $val) 
    {?>
    <tr>
        <th scope="row"><?=$i;?></th>
        <td class="data" data-val="<?=$val['P_Name'];?>"><?=$val['P_Name'];?></td>
        <?php $cid = $val['P_Cat_Id'];?>
        <?php
        $sqlCData = "SELECT cat.C_name FROM `tb_catagoryinfo` AS cat WHERE Id=$cid";
            $sqlCResult = mysqli_query($conn,$sqlCData);
            foreach($sqlCResult as $re)
            {?>
                <td><?=$re['C_name'];?></td>
        <?php    }
        ?>
        <td>৳<?=$val['P_Price'];?>/-</td>
    </tr> <?php $i++; $total_value = $total_value+$val['P_Price']; } ?>
</tbody>

    <th scope="col"></th>
    <th scope="col"></th>
    <?php
    $totalAmount = "SELECT sum(P_Price) FROM tb_productinfo ";
    $sqlTotalAmountResult = mysqli_query($conn,$totalAmount);
    while($row = mysqli_fetch_array($sqlTotalAmountResult))
    {
        ?><th scope="col">Total Price</th>
        <th scope="col"><?php echo $row['sum(P_Price)']; ?></th>
<?php    }    ?>


</table>








<div class="container">
    <?php
    if(!isset($_GET['pages'])){
        $page = 1;
    }
    else{
        $page = $_GET['pages'];
    }?>
    <p>showing <?php echo $page; ?> of <?php echo $total_pages; ?> pages. And total price per page: <?php echo $total_value; ?>/-</p>

    <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="?pages=1">Fist</a></li>
        <li class="page-item">
            <?php 
                if(isset($_GET['pages']) && $_GET['pages'] > 1)
                {?>
                    <a class="page-link" href="?pages= <?php echo $_GET['pages'] - 1; ?> "><span aria-hidden="true">&laquo;</span></a>
                <?php }
                else
                { ?>
                    <a class="page-link"><span aria-hidden="true">&#8653;</span></a>
            <?php }
            ?>    
        </li>
        
            <?php 
            for($i=1; $i<=$total_pages; $i++)
            {
                ?><li class="page-item">
                <a href="?pages=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php
            }
            ?>
        
        <li class="page-item">
            <?php
            if(!isset($_GET['pages'])){
                ?>
                <a href="?pages=2" class="page-link"><span aria-hidden="true">&raquo;</span></a>
                <?php
            }
            else{
                if($_GET['pages']>=$total_pages){
                    ?>
                    <a class="page-link"><span aria-hidden="true">&#8655;</span></a>
                    <?php
                }
                else{
                    ?>
                    <a href="?pages=<?php echo $_GET['pages']+1; ?>" class="page-link"><span aria-hidden="true">&raquo;</span></a>
                    <?php
                }
            }
            ?>
        </li>
        <li class="page-item"><a class="page-link" href="?pages=<?php echo $total_pages;?>">Last</a></li>
    </ul>
    </nav>
</div>



 <!--product pagination end -->

 <section id="productInfo">
    <div class="container">
        <div class="row">
<?php
    $sqlData = "SELECT * FROM tb_productinfo LIMIT $start_from, $num_per_page";$i=1;
    $sqlResult = mysqli_query($conn,$sqlData);
    foreach($sqlResult as $val) 
    {?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card"><a href="index.php">
                <img src="P_Pic/<?php echo $val['P_Image'];?>" alt="image loading..." class="img-fluid" style="width:100%; height: 300px;"></a>
                <div class="card-body">
                    <h2><a href="#"><?php echo $val['P_Name'];?></a></h2>
                    <h3>৳<?php echo $val['P_Price'];?>/-</h3>
                </div>
            </div>
        </div>
<?php $i++; }
?>
            
        </div>
    </div>
 </section>


 
<div class="container">
    <?php
    if(!isset($_GET['pages'])){
        $page = 1;
    }
    else{
        $page = $_GET['pages'];
    }?>
    <p>showing <?php echo $page; ?> of <?php echo $total_pages; ?> pages. And total price per page: <?php echo $total_value; ?>/-</p>

    <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="?pages=1">Fist</a></li>
        <li class="page-item">
            <?php 
                if(isset($_GET['pages']) && $_GET['pages'] > 1)
                {?>
                    <a class="page-link" href="?pages= <?php echo $_GET['pages'] - 1; ?> "><span aria-hidden="true">&laquo;</span></a>
                <?php }
                else
                { ?>
                    <a class="page-link"><span aria-hidden="true">&#8653;</span></a>
            <?php }
            ?>    
        </li>
        
            <?php 
            for($i=1; $i<=$total_pages; $i++)
            {
                ?><li class="page-item">
                <a href="?pages=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php
            }
            ?>
        
        <li class="page-item">
            <?php
            if(!isset($_GET['pages'])){
                ?>
                <a href="?pages=2" class="page-link"><span aria-hidden="true">&raquo;</span></a>
                <?php
            }
            else{
                if($_GET['pages']>=$total_pages){
                    ?>
                    <a class="page-link"><span aria-hidden="true">&#8655;</span></a>
                    <?php
                }
                else{
                    ?>
                    <a href="?pages=<?php echo $_GET['pages']+1; ?>" class="page-link"><span aria-hidden="true">&raquo;</span></a>
                    <?php
                }
            }
            ?>
        </li>
        <li class="page-item"><a class="page-link" href="?pages=<?php echo $total_pages;?>">Last</a></li>
    </ul>
    </nav>
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<script src="js/main.js"></script>
    
</body>
</html>

<?php 

    }
    else{
        header("Location: log.php");
        exit();
    }

?>
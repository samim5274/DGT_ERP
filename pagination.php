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
    <!-- Salary section start -->

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
            <?php
                $sql = "SELECT * FROM tb_employeeinfo";
                $res = mysqli_query($conn,$sql);
                $total_record = mysqli_num_rows($res);
                $total_pages = ceil($total_record/$num_per_page);
                for($i=1;$i<=$total_pages; $i++)
                {
                    echo'
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="pagination?pages='.$i.'">'.$i.'</a>
                            </li>
                        </ul>
                    </nav>
                ';
                    // echo '<a href="pagination?pages='.$i.'">'.$i.'</a>';
                }
            ?>
        </div>
    </div>
</section>

<!-- Salary section end -->

<?php
    $sql = "SELECT * FROM tb_employeeinfo";
    $res = mysqli_query($conn,$sql);
    $total_record = mysqli_num_rows($res);
    $total_pages = ceil($total_record/$num_per_page);
    for($i=1;$i<=$total_pages; $i++)
    {
        echo'
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="pagination?pages='.$i.'">'.$i.'</a>
                </li>                
            </ul>
        </nav>
    ';
    }
?>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="pagination?pages='.$i.'">1</a></li>                
        <li class="page-item"><a class="page-link" href="pagination?pages='.$i.'">2</a></li>                
        <li class="page-item"><a class="page-link" href="pagination?pages='.$i.'">3</a></li>                
    </ul>
</nav>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>
</html>
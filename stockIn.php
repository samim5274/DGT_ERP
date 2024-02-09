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
    <title>-Deegautex Stockin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="button89.css" media="screen">
</head>
<body>

<?php 
    $uname = "".$_SESSION['E_Name'];
    $Id = "".$_SESSION['Id'];
    if($uname && $Id)
    {
        $_SESSION['E_Name'] = $uname;
        $_SESSION['Id'] = $Id;
    }
?>

    <br><br><br>

    <div class="text-center container">
    <div class="row">
        <div class="col-3"><a href="product.php"><button class="button89 mt-4" role="button">Back</button></a></div>
        <div class="col-6"><h3 class="display-5">Product storein Information</h3></div>
        <div class="col-3"></div>
    </div>
</div><br>


<section id="stockin-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <?php if(isset($_GET['error'])){ ?> <p class="error"><?php echo $_GET['error']; ?></p> <?php } ?>
                <form action="stockinBK.php" method="POST">
                <label for="cbxProductName" class="form-label">Product Name</label><br>
                <select name="cbxProductName" required class="form-field form-select" id="cbxProductName">
                    <?php 
                        $sqlData = "SELECT * FROM tb_productinfo";
                        $sqlResult = mysqli_query($conn,$sqlData); ?>
                    <option selected disabled>Select Product</option>
                    <?php while($row = mysqli_fetch_array($sqlResult)){?>
                    <option value="<?php echo $row['Id']; ?>"><?php echo $row['P_Name']; ?></option>
                <?php } ?>
                </select><br>
                <div class="form-floating">
                    <input name="txtQty" type="number" class="form-control" id="qty" placeholder="Qty" required>
                    <label for="qty">QTY</label>
                </div><br>
                <div class="form-floating">
                    <input name="txtRemark" type="text" class="form-control" id="remark" placeholder="Remark"></input>
                    <label for="remark">Remark</label>
                </div>
                <div class="mt-4 text-center">
                    <button class="button89" role="button" name="btnSubmit">Submite</button>
                </div>
                </form>
                <div class="text-center mb-4">
                    <a href="index.php"><button class="button89  mt-2" role="button">Home</button></a>
                    <a href="product.php"><button class="button89  mt-2" role="button">Back</button></a>
                    <a href="#"><button class="button89  mt-2" role="button">Cancel</button></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Date</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">QTY</th>
                </tr>
            </thead>
            <?php
            
                $sqlData = "SELECT * FROM tb_stock_in";
                $i=1;
                $sqlResult = mysqli_query($conn,$sqlData);
            ?>
            <tbody>
                <?php $i=1; foreach($sqlResult as $val) 
                {?>
                <tr>
                    <th scope="row"><?=$i;?></th>
                    <td><?=$val['SI_Date'];?></td>
                    <?php $cid = $val['P_Id'];?>
                    <?php
                    $sqlCData = "SELECT cat.P_Name FROM `tb_productinfo` AS cat WHERE Id=$cid";
                        $sqlCResult = mysqli_query($conn,$sqlCData);
                        foreach($sqlCResult as $re)
                        {?>
                            <td><?=$re['P_Name'];?></td>
                    <?php    }
                    ?>
                    <td><?=$val['SI_QTY'];?> Pcs</td>
                </tr> <?php $i++; } ?>
            </tbody>

                <th scope="col"></th>
                <th scope="col"></th>
                <?php
                $totalAmount = "SELECT sum(SI_QTY) FROM tb_stock_in";
                $sqlTotalAmountResult = mysqli_query($conn,$totalAmount);
                while($row = mysqli_fetch_array($sqlTotalAmountResult))
                {
                    ?><th scope="col">Total QTY</th>
                    <th scope="col"><?php echo $row['sum(SI_QTY)'].' Pcs'; ?></th>
            <?php    }    ?>

            </table>
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
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

    <!-- <link rel="stylesheet" href="button89.css" media="screen"> -->
    <link rel="stylesheet" href="stockOut.css" media="screen">
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
        <div class="col-3"><a href="product.php"><button class="button-30 mt-4" role="button">Back</button></a></div>
        <div class="col-6"><h3 class="display-5">Product Store Out Information</h3></div>
        <div class="col-3"></div>
    </div>
</div><br>


<section id="stockout-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <?php if(isset($_GET['error'])){ ?> <p class="error"><?php echo $_GET['error']; ?></p> <?php } ?>
                <form action="stockOutBK.php" method="POST">

                <!-- <label for="cbxProductName" class="form-label">Product Name</label><br> -->
                <select name="cbxProductName" required class="form-field form-select" id="cbxProductName">
                    <?php 
                        $sqlData = "SELECT * FROM tb_productinfo";
                        $sqlResult = mysqli_query($conn,$sqlData); ?>
                    <option selected disabled>Select Product</option>
                    <?php while($row = mysqli_fetch_array($sqlResult)){?>
                    <option value="<?php echo $row['Id']; ?>"><?php echo $row['P_Name']; ?></option>
                <?php } ?>
                </select><br>

                <!-- <label for="cbxRecEmp" class="form-label">Received Employee</label><br> -->
                <select name="cbxRecEmp" required class="form-field form-select" id="cbxRecEmp">
                    <?php 
                        $sqlData = "SELECT * FROM tb_employeeinfo";
                        $sqlResult = mysqli_query($conn,$sqlData); ?>
                    <option selected disabled>Select Employee</option>
                    <?php while($row = mysqli_fetch_array($sqlResult)){?>
                    <option value="<?php echo $row['Id']; ?>"><?php echo $row['E_Name']; ?></option>
                <?php } ?>
                </select><br>

                <div class="form-floating">
                    <input name="txtQty" type="number" class="form-control form-field" id="qty" placeholder="Qty" required>
                    <label for="qty">QTY</label>
                </div><br>

                <div class="mt-2 text-center">
                    <button class="button-30" role="button" name="btnSubmit">Submite</button>
                </div>
                </form>

                <div class="text-center mb-4">
                    <a href="index.php"><button class="button-30  my-2" role="button">Home</button></a>
                    <a href="product.php"><button class="button-30  my-2" role="button">Back</button></a>
                    <a href="#"><button class="button-30  my-2" role="button">Cancel</button></a>
                </div>

            </div>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Date</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">QTY</th>
                </tr>
            </thead>
            <?php
            
                $sqlData = "SELECT * FROM tb_stock_out";
                $sqlResult = mysqli_query($conn,$sqlData);
            ?>
            <tbody>
                <?php 
                $i=1;
                foreach($sqlResult as $val)
                {?>
                <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $val['SO_Date'];?></td>
                    
                    <?php $ERid = $val['ER_Id'];?>
                    <?php
                        $sqlCData = "SELECT cat.E_Name FROM tb_employeeinfo AS cat WHERE Id=$ERid";
                        $sqlCResult = mysqli_query($conn,$sqlCData);
                        foreach($sqlCResult as $re)
                        {?>
                            <td><?php echo $re['E_Name'];?></td>
                    <?php    }
                    ?>
                    
                    <?php $cid = $val['P_Id'];?>
                    <?php
                    $sqlCData = "SELECT cat.P_Name FROM `tb_productinfo` AS cat WHERE Id=$cid";
                        $sqlCResult = mysqli_query($conn,$sqlCData);
                        foreach($sqlCResult as $re)
                        {?>
                            <td><?php echo $re['P_Name'];?></td>
                    <?php    }
                    ?>

                    <td><?php echo $val['SO_QTY'];?> Pcs</td>
                </tr> <?php $i++; } ?>
            </tbody>

                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <?php
                $totalAmount = "SELECT sum(SO_QTY) FROM tb_stock_out";
                $sqlTAResult = mysqli_query($conn,$totalAmount);
                while($row = mysqli_fetch_array($sqlTAResult))
                {?>
                    <th scope="col">Total QTY</th>
                    <th scope="col"><?php echo $row['sum(SO_QTY)'].' Pcs'; ?></th>
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
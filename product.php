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
    <title>Deegautex (Pvt). Ltd.</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="prodcut_style.css" media="screen">
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
    include 'menuBar.php';
?>


<section id="production-section">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="wrapper">
                    <h2>Product Information</h2>
                    <form action="ProductInfoBK" enctype="multipart/form-data" method="POST">
                        <input type="text" class="form-field" name="txtPname" required placeholder="Product Name">
                        <!--Get all catagory from database-->
                        <select name="cbxCat" class="form-field" id="catName">
                            <?php 
                                $sqlData = "SELECT * FROM tb_catagoryinfo";
                                $sqlResult = mysqli_query($conn,$sqlData); ?>
                            <option selected disabled>Select Catagory</option>
                            <?php while($row = mysqli_fetch_array($sqlResult)){?>
                            <option value="<?php echo $catName = $row['Id']; ?>"><?php echo $row['C_Name']; ?></option>
                       <?php } ?>
                        </select>

                        <input type="number" class="form-field" name="txtPrice" placeholder="Purchease Price">
                        <input type="text" class="form-field" name="txtRemark" placeholder="Short Discription">
                        <input type="file" class="form-field" name="my_image">
                        <button name="btnSubmit" class="btn">Submit</button>
                    </form>
                    <div class="text-center fs-6">
                        <!-- <p><a href="productFilter.php"> Product Fillter </a> & <a href="stockin.php">Stock input</a> </p> -->
                        <div class="row">
                        <div class="col-6"><a href="stockOut"><button class="btn"> Stock out </button></a></div>
                        <div class="col-6"><a href="stockIn"><button class="btn">Stock In</button></a></div>
                        <a href="productFilter"><button class="btn"> Product Fillter </button></a>
                        <a href="index"><button class="btn">Back</button></a>
                        </div>
                    </div>
                </div>
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
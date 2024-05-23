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
    <title>PPM-FIR-INLINE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
    //menu secection
    include 'menuBar.php';
?>
    

<section id="form-section" class="mt-4">
    <div class="container">
        <div class="row">
            <div class="text-center text-bg-primary py-3 my-3"><h2>PPM - Inline - FRI</h2></div>
            <div class="">
            <?php if(isset($_GET['error'])){ ?> <p class="error text-center text-danger mark"><?php echo $_GET['error']; ?></p> <?php } ?>
            <?php if(isset($_GET['success'])){ ?> <p class="alert alert-success text-center text-success mark"><?php echo $_GET['success']; ?></p> <?php } ?>
                <form action="reportBK" enctype="multipart/form-data" method="POST" class="row g-3">
                    <div class="col-md-10">
                        <label for="Seasion" class="form-label">Seasion</label>
                        <select id="Seasion" name="cbxSeasion" class="form-select" required>
                            <?php    
                            $sqlData = "SELECT * FROM tb_seasion";
                            $sqlResult = mysqli_query($conn,$sqlData); ?>
                            <option selected disabled>Select Designation</option>
                            <?php while($row = mysqli_fetch_array($sqlResult)){?>
                            <option value="<?php echo $depId = $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php } ?>                            
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail4" class="form-label">Add New Seasion</label>
                        <a href="#"><button type="button" class="btn btn-outline-secondary">Add New Seasion</button></a>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Style</label>
                        <input type="number" name="txtStyle" class="form-control" id="inputAddress" required>
                    </div>
                    <div class="col-md-6">
                        <label for="PO" class="form-label">PO</label>
                        <input type="number" name="txtPO" class="form-control" id="PO" required>
                    </div>
                    <div class="col-md-4">                        
                        <label for="inputCity" class="form-check-label">Inline</label>
                        <input type="text" name="txtInline"  class="form-control" id="inputCity" required placeholder="Enter the inline reporter name">
                    </div>
                    <div class="col-md-4">                        
                        <label for="inputState" class="form-check-label">PPM</label>
                        <input type="text" name="txtPPM"  class="form-control" id="inputState" required placeholder="Enter the PPM reporter name">
                    </div>
                    <div class="col-md-4">               
                        <label for="inputZip" class="form-check-label">FRI</label>         
                        <input type="text" name="txtFRI"  class="form-control" id="inputZip" required placeholder="Enter the FRI reporter name">
                    </div>
                    <div class="col-12">
                        <button name="btnReportSave" type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<section id="show-table" class="mt-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Seasion</th>
                        <th scope="col">Style</th>
                        <th scope="col">PO</th>
                        <th scope="col">PPM</th>
                        <th scope="col">Inline</th>
                        <th scope="col">FRI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sqlData = "SELECT * FROM tb_ppm_inline_fri";
                        $sqlResult = mysqli_query($conn, $sqlData);
                        $i=1;
                        while($row = mysqli_fetch_array($sqlResult)){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i;?></th>
                            <?php 
                            $seasionid = $row['seasion'];
                            $seasionData = "SELECT * FROM `tb_seasion` WHERE id = '$seasionid'";
                            $seasionResult = mysqli_query($conn, $seasionData);
                            while($row2 = mysqli_fetch_array($seasionResult))

                            {?> <td><?php echo $row2['name'];?></td><?php  } ?>    

                            <td><?php echo $row['style'];?></td>
                            <td><?php echo $row['po'];?></td>
                            <td><?php echo $row['ppm'];?></td>
                            <td><?php echo $row['inline'];?></td>
                            <td><?php echo $row['fri'];?></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>

<?php 


}
else{
    header("Location: log");
    exit();
}

?>
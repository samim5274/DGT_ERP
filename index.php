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

    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="responsive.css" media="screen">
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



<!-- dashboard section star -->

<br>
<section id="dashboard-section">
    <div class="dashboard">
        <div class="container text-light text-center">
            <div class="row">
                <div class="col-lg-4">
                    <form action="">
                        <div class="card bg-secondary">
                            <div class="card-body">
                                <p>Total Absence Employee</p>
                                <h2 class="display-4">63</h2>
                                <p>People</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                <form action="">
                        <div class="card bg-dark">
                            <div class="card-body">
                                <p>Today Total Stock In</p>
                                <h2 class="display-4">142</h2>
                                <p>Pcs</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                <form action="">
                        <div class="card bg-success">
                            <div class="card-body">
                                <p>Today Total Stock Out</p>
                                <h2 class="display-4">163</h2>
                                <p>Pcs</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- row  divided --><br>
            <div class="row">
                <div class="col-lg-4">
                    <form action="">
                        <div class="card bg-warning text-dark">
                            <div class="card-body">
                                <p>Today Offce Employee</p>
                                <h2 class="display-4">34</h2>
                                <p>People</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                <form action="">
                        <div class="card bg-danger">
                            <div class="card-body">
                                <p>Today Factory Employee</p>
                                <h2 class="display-4">05</h2>
                                <p>People</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                <form action="">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <p>Total Employee's</p>
                                <h2 class="display-4">63</h2>
                                <p>People</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- dashboard section end -->


<?php include 'footer.php'; ?>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


    </body>
</html>

<?php 


}
else{
    header("Location: log");
    exit();
}

?>
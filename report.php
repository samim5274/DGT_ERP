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
                <form class="row g-3">
                    <div class="col-md-10">
                        <label for="inputEmail4" class="form-label">Seasion</label>
                        <select id="inputState" class="form-select">
                            <option selected disabled>Choose...</option>
                            <option>SS-24</option>
                            <option>AW-24</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail4" class="form-label">Add New Seasion</label>
                        <a href="#"><button type="button" class="btn btn-outline-secondary">Add New Seasion</button></a>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Style</label>
                        <input type="text" class="form-control" id="inputAddress" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">PO</label>
                        <input type="text" class="form-control" id="inputAddress">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Reporter</label>
                        <input type="text" class="form-control" id="inputAddress2">
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label">Inline</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">PPM</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-4">
                        <label for="inputZip" class="form-label">FRI</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button  class="btn btn-danger">Edit</button>
                        <button  class="btn btn-warning">Back</button>
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
                        <tr>
                            <th scope="row">1</th>
                            <td>AW-24</td>
                            <td>1005692</td>
                            <td>4100035789</td>
                            <td>Parves</td>
                            <td>Simanta</td>
                            <td>Shanto Rabby</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>AW-24</td>
                            <td>1005692</td>
                            <td>4100035789</td>
                            <td>Parves</td>
                            <td>Simanta</td>
                            <td>Shanto Rabby</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>AW-24</td>
                            <td>1005692</td>
                            <td>4100035789</td>
                            <td>Parves</td>
                            <td>Simanta</td>
                            <td>Shanto Rabby</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>AW-24</td>
                            <td>1005692</td>
                            <td>4100035789</td>
                            <td>Parves</td>
                            <td>Simanta</td>
                            <td>Shanto Rabby</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>AW-24</td>
                            <td>1005692</td>
                            <td>4100035789</td>
                            <td>Parves</td>
                            <td>Simanta</td>
                            <td>Shanto Rabby</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<section id="pagination">
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
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
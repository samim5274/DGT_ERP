<?php

    include 'dbconfig.php';

    if(isset($_POST['btnSubmit']) && isset($_FILES['my_image']))
    {
        $Pname = $_POST['txtPname'];
        $CatId = $_POST['cbxCat'];
        $PPrice = $_POST['txtPrice'];
        $Remark =  $_POST['txtRemark'];

        // echo"<pre>";    
        // print_r($_FILES['my_image']);
        // echo"</pre>"; 


        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if($error === 0)
        {
            if($img_size > 1250000)
            {
                $ex="picture size to big!";
                header("Location: addProduct.php?error=$ex");
            }
            else
            {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg","jpeg","png","webp");
                if(in_array($img_ex_lc, $allowed_exs))
                {
                    $img_new_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_up_path = "P_Pic/".$img_new_name;
                    move_uploaded_file($tmp_name, $img_up_path);

                    $sqlData = "INSERT INTO tb_productinfo(`P_Name`, `P_Cat_Id`, `P_Price`, `P_Remark`, `P_Image`) VALUES ('$Pname','$CatId','$PPrice','$Remark','$img_new_name')";

                    $sqlResult = mysqli_query($conn,$sqlData);
                    $ex = "Product save succesfully with picture.";
                    header("Location: product.php?error=$ex");
                }
                else
                {
                    $ex="Extention not allowed!";
                    header("Location: product.php?error=$ex");
                }
            }
            
        }
        else
        {
            $ex = "Unknown error found. Please select good picture.";
            header("Location: product.php?error=$ex");
        }

    }
    else
    {
        $ex="You must be select product picture!";
        header("Location: product.php?error=$ex");
    }
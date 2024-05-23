<?php 

    include 'dbconfig.php';

    if(isset($_POST['btnReportSave']))
    {
        $seasion = $_POST['cbxSeasion'];
        $po = $_POST['txtPO'];
        $style = $_POST['txtStyle'];
        $reporter = $_POST['txtReporter'];
        $ppm = $_POST['txtPPM'];
        $inline = $_POST['txtInline'];
        $fri = $_POST['txtFRI'];

        if($seasion == NULL)
        {
            $message = "Seasion are not selected. Please first select the SEASION";
            header("Location: report?error=$message");
        }
        else
        {
            $sqlData = "INSERT INTO `tb_ppm_inline_fri`( `seasion`, `style`, `po`, `ppm`, `inline`, `fri`) VALUES ('$seasion','$style','$po','$ppm','$inline','$fri')";
            $sqlResult = mysqli_query($conn, $sqlData);
            $message = "Data insert successfully.";
            header("Location: report?success=$message");
        }
    }

?>
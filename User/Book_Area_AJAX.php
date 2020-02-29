<?php
require("../connection.php");
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <!----webfonts--->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Nav CSS -->
    <link href="../css/custom.css" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>
    <script src="../js/custom.js"></script>
</head>
<body>
<?php $City_id=$_GET['q'];
//echo "SELECT * FROM `area_master` WHERE City_id='$City_id'"; die(); ?>
<select name="Area" class="form-control1">
    <option value="">-------------------------------&nbsp;&nbsp;SELECT AREA&nbsp;&nbsp;-------------------------------</option>
    <?php
    //$City_id=$_GET['q'];
    $query="SELECT * FROM `area_master` WHERE City_id='$City_id'";
    if( !( $Res = mysqli_query($con, $query ) ) ){
        echo 'Retrieval of data from Database Failed - #'.mysqli_errno($con).': '.mysqli_error($con);
    }
    else {
        if( mysqli_num_rows( $Res )==0 ){
            echo '<option>No Rows Returned</option>';
        }
        else
        {
            while( $r = mysqli_fetch_assoc( $Res ) )
            {
                echo "<option value={$r['Area_id']}>{$r['Area_name']}</option>";
            }
        }
    }

    ?>
</select>
</body>
</html>
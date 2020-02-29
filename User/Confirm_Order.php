<!DOCTYPE HTML>
<html style="background: #FFF;">
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>Book Service</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-left: 0px; min-height: 399px;">
        <div class="graphs">
            <div class="xs" style="margin-top: 88px;">
                <h3>Order Summary</h3>
                <div class="col_1" style="margin-top: 48px;">
                    <div class="col-md-10 span_3" style="margin: auto;float: none;">
                        <div class="bs-example1" data-example-id="contextual-table" style="height: auto;margin: auto;">
                            <?php

                            #$ssselect = "SELECT * FROM `subservice_master` WHERE Subservice_id='{$_POST['SService']}'";
                            #$ssRes = mysqli_query( $con,$ssselect);
                            #$ssrow=mysqli_fetch_assoc($ssRes);

                            $sselect = "SELECT * FROM `service_master` WHERE Service_id='{$_POST['Service']}'";
                            $sRes = mysqli_query( $con, $sselect );
                            $srow=mysqli_fetch_assoc($sRes);

                            $cselect = "SELECT * FROM `city_master` WHERE City_id='{$_POST['City']}'";
                            $cRes = mysqli_query( $con, $cselect );
                            $crow=mysqli_fetch_array($cRes);

                            $aselect = "SELECT * FROM `area_master` WHERE Area_id='{$_POST['Area']}'";
                            $aRes = mysqli_query( $con, $aselect );
                            $arow=mysqli_fetch_assoc($aRes);

                            ?>
                            <form id="form1" name="form1" method="post">
                            <div class="col-sm-12" align="center" style="margin-bottom: 20px;">
                                <div class="col-sm-12">
                                    You're about to book sub-service <b><?php #echo $ssrow['Subservice_name']?></b> of service <b><?php echo $srow['Service_type']?></b> !
                                </div>
                                <!--input type="hidden" name="ESubService" value="<?php #echo $_POST['SService']?>"-->
                                <input type="hidden" name="EService" value="<?php echo $_POST['Service']?>">


                                -->
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-2">
                                    For Address :
                                </div>
                                <div class="col-sm-4"><b><?php echo $_POST['Address']?>, <?php echo $arow['Area_name']?>, <?php echo $crow['City_name']?></b></div>
                                <input type="hidden" name="ECity" value="<?php echo $_POST['City']?>">
                                <input type="hidden" name="EArea" value="<?php echo $_POST['Area']?>">
                                <input type="hidden" name="Address1" value="<?php echo $_POST['Address']?>">
                                <div class="col-sm-2"> </div>
                                <div class="col-sm-4" align="center">
                                    <div class="col-sm-12">Minimum Charges will be</div>
                                    <div class="col-sm-12" style="border: 1px solid;margin-top: 8px;padding-top: 4px;padding-bottom: 4px;"><b><?php echo $srow['Service_fees']?> CAD </b>/ Hour<br> Consultancy Charges (Excluding Tax)</div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="margin-top: 8px;">
                                <div class="col-sm-2">
                                    Problem Description :
                                </div>
                                <div class="col-sm-10">
                                    <?php echo $_POST['Problem']?>
                                    <input type="hidden" name="EProblem" value="<?php echo $_POST['Problem']?>">
                                </div>
                            </div>
                                <input type="hidden" name="CCharge" value="<?php echo $srow['Service_fees']?>">
                            <div class="col-sm-12" align="center" style="margin-top: 24px;margin-bottom: 16px;">
                                Are you sure about booking ?
                            </div>
                            <div class="col-sm-12" align="center">
                                <div class="col-sm-3"> </div>
                                <div class="col-sm-2" align="right">
                                    <button type="submit" name="Edit" formaction="Book_Service.php" class="btn btn-default">Edit !</button>
                                </div>
                                <div class="col-sm-2" align="center">
                                    <button type="submit" name="Book" formaction="Utility_Book.php" class="btn btn-default">Book it !</button>
                                </div>
                                <div class="col-sm-2" align="left">
                                    <!--input type="button" class="btn btn-default" value="Cancel"-->
                                    <a href="Book_Service.php" class="btn btn-default">Back</a>
                                </div>
                            </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"> </div>
                        <div class="copy_layout">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
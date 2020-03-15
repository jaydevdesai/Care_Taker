<!DOCTYPE HTML>
<html>
<?php
require("../connection.php");
require_once("Navigation.php");
?>
<head>
    <title>Previous Services</title>
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper" style="margin-left: 0px; min-height: 399px;">
        <div class="graphs">
            <div class="xs" style="margin-top: 88px;">
                <h3>View Previous Services</h3>
                <?php
                $selectSQL = "SELECT * FROM `receipt_master` where Emp_id='{$_SESSION['User_id']}' AND Status=3 ORDER BY `Booking_date` DESC";
                # Execute the SELECT Query
                if( !( $selectRes = mysqli_query($con, $selectSQL ) ) ){
                    echo 'Retrieval of data from Database Failed - #'.mysqli_errno($con).': '.mysqli_error($con);
                }
                else {
                    if (mysqli_num_rows($selectRes) == 0) {
                        echo '<div class="col_1" style="margin-top: 48px;">';
                        echo "<div class='col-md-10 span_3' style='margin: auto;float: none;'>";
                        echo "<div class='bs-example1' data-example-id='contextual-table' style='height: auto;margin: auto;font-weight: 500;' align='center'>You haven't served any Services yet!";
                        echo '</div></div></div>';
                    }
                    else
                    {
                        while ($row = mysqli_fetch_assoc($selectRes)) {

                            $USelect="SELECT * FROM `user_master` WHERE User_id='{$row['User_id']}'";
                            $UResult=mysqli_query($con,$USelect);
                            $Urow=mysqli_fetch_assoc($UResult);
                            $UName=$Urow['First_name']." ".$Urow['Last_name'];

                            $CSelect="SELECT City_name FROM `city_master` WHERE City_id='{$row['City_id']}'";
                            $CResult=mysqli_query($con,$CSelect);
                            $CRow=mysqli_fetch_assoc($CResult);

                            $ASelect="SELECT Area_name FROM `area_master` WHERE Area_id='{$row['Area_id']}'";
                            $AResult=mysqli_query($con,$ASelect);
                            $ARow=mysqli_fetch_assoc($AResult);

                            echo '<div class="col_1" style="margin-top: 48px;">';
                                echo '<div class="col-md-10 span_3" style="margin: auto;float: none;">';
                                    echo '<div class="bs-example1" data-example-id="contextual-table" style="height: auto;margin: auto;">';
                                        echo '<div class="col-sm-12">';
                                            echo '<div class="col-sm-2">Receipt Id :</div>';
                                            echo '<div class="col-sm-1" style="font-weight: 500">';
                                                echo $row["Receipt_id"];
                                            echo '</div>';
                                            echo '<div class="col-sm-4">&nbsp;</div>';
                                            echo '<div class="col-sm-2" align="right">Booking Date :</div>';
                                            echo "<div class='col-sm-3' align='center' style='font-weight: 500'>{$row['Booking_date']}</div>";
                                        echo '</div>';
                                        echo '<div class="col-sm-12" align="right">';
                                            echo '<div class="col-sm-6"> </div>';
                                            echo '<div class="col-sm-3">Service Completion Date :</div>';
                                            echo "<div class='col-sm-3' align='center' style='font-weight: 500;'>{$row['SServed_date']}</div>";
                                        echo '</div>';
                                        echo '<div class="col-sm-12" style="margin-bottom: 10px;">';
                                            echo "<div class='col-sm-3'>Customer's Name<br>(Customer's Id) :</div>";
                                            echo "<div class='col-sm-4' style='padding-top: 10px;'>";
                                            //if(isset($SName) && isset($Sid)){ echo "$SName ($Sid)"; }
                                            echo "$UName ({$row['User_id']})";
                                            echo "</div>";
                                        echo '</div>';
                                        echo '<div class="col-sm-12">';
                                            echo "<div class='col-sm-3'>Customer's Address :</div>";
                                            echo "<div class='col-sm-4'>{$row['Address']}, {$ARow['Area_name']}, {$CRow['City_name']}";
                                            //if(isset($AName) && isset($CName)){echo ", $AName, $CName";};
                                            echo "</div>";
                                            echo '<div class="col-sm-1" align="right"> </div>';
                                            echo '<div class="col-sm-4" align="center" style="border: 1px solid;">';
                                                echo "Grand Total<br><h3 style='margin-bottom: 10px;margin-top: 4px;font-weight: 500'>&nbsp;{$row['Bill_amt']} Rs.</h3>";
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="col-sm-12" style="margin-top: 12px;">';
                                            echo '<div class="col-sm-3">Problem Description :</div>';
                                            echo "<div class='col-sm-4'>{$row['Problem_desc']}</div>";
                                            echo '<div class="col-sm-1"> </div>';
                                            echo '<div class="col-sm-4" align="center" style="padding-top: 8px;">';
                                            echo "Service Rating<br><h4 style='margin-bottom: 8px;margin-top: 4px;;font-weight: 500'>&nbsp;{$row['Rating']}/5</h4>";
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="col-sm-12" style="margin-bottom: 16px;">';
                                            echo '<div class="col-sm-3">Problem Solution :</div>';
                                            echo "<div class='col-sm-4'>{$row['Solution']}</div>";
                                            echo '<div class="col-sm-1"> </div>';
                                        echo '</div>';
                                        echo '<div class="clearfix"></div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }

                    }
                }
                ?>
                <div class="clearfix"> </div>
                <div class="copy_layout">

                </div>
            </div>
        </div>
    </div>
</div>
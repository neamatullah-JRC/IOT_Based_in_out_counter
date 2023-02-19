<?php
 session_start();
 
 

require './admin/dbconfig.php';
$did = $_SESSION['user_id'];
$sql = "SELECT did, increase, decrease, inside, total FROM counter WHERE did = '$did'";

//$result = $conn->query($sql);
  $result = mysqli_query($conn, $sql);
        
while ($data = $result->fetch_assoc()){
    $sensor_data[] = $data;
}


include_once('./admin/header.php');

//$readings_time = array_column($sensor_data, 'reading_time');

//$in = mysqli_query($conn,"SELECT increase FROM counter WHERE did = $did" );
$in = json_encode(array_reverse(array_column($sensor_data, 'increase')), JSON_NUMERIC_CHECK);
$out = json_encode(array_reverse(array_column($sensor_data, 'decrease')), JSON_NUMERIC_CHECK);
$inside = json_encode(array_reverse(array_column($sensor_data, 'inside')), JSON_NUMERIC_CHECK);
$total = json_encode(array_reverse(array_column($sensor_data, 'total')), JSON_NUMERIC_CHECK);




$result->free();
$conn->close();
?>

<!DOCTYPE html>
<html>
    </head>
    
        <style>
           table, th, td {
             border: 2px solid black;
            }
            .main {
                
                background-color: lightgrey;
                width: 80%;
                border: 15px solid green;
                padding: 10px;
                margin: 20px;
                position: absolute;
                top: 40%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .in{
                text-align:left;
                color:Green;
                font-family: Arial;
                font-size: 3rem;
            }
            .out{
                text-align:right;
                color:Blue;
                font-family: Arial;
                font-size: 3rem;
            }
            
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
                border-radius: 50%;
            }
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #e6e6e6;
                color: black; 
                text-align: center;
            }
            .container {
                font-size: 0; /* to remove white space between inline-block elements */
            }

            .left, .right {
                display: inline-block;
                width: 50%;
                font-size: 16px; /* to reset font size */
            }

            .left {
                text-align: left;
                color:red;
                font-family: Arial;
                font-size: 3rem;            }

            .right {
                text-align: right;
                color:red;
                font-family: Arial;
                font-size: 3rem;
            }
            .blink_me {
                animation: blinker 1s linear infinite;
            }

            @keyframes blinker {
                50% {
                    opacity: 0;
                }
            }
   
        </style>
        <!--- <meta http-equiv="refresh" content="3; url="<?php //echo $_SERVER['PHP_SELF']; ?>"> --->
        
    </head>
    <body>
        <form action="logout.php" method="POST">
  <button type="submit">Logout</button>
</form>

    <div class="main">

 <table style="width:100%">
<tr>
<td>
<div class="in">
    <?php
    echo "Visitor IN $in";
    ?>
</div>
</td>
<td>
<div class="out">
    <?php
    echo "Visitor OUT $out";
    ?>
</div>
</td>
</tr>
<tr>
<td colspan="2">
    
<?php

echo "<div class='container'><div class='left'>Inside" . $inside . "</div><div class='right'>Total visitor" . $total . "</div></div>";
//echo "<div class='total'>Total visitor" . $total . "</div>";

?>
</td>
</div>
</tr>
 </table>
</div>

    </body>
  <?php include_once('./admin/footer.php'); ?>

</html>

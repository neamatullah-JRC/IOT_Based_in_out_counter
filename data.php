<?php


require './admin/dbconfig.php';


// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $did =  $_POST['did'];
    $increment = intval($_POST['increment']);
    $decrement = intval($_POST['decrement']);

    $sql = "SELECT * FROM counter WHERE did = '$did'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
        }
      //  echo "$did";
    echo $id;
    // Update the value in the database
    if ($increment == 1)
    {
            $sql = "UPDATE counter SET inside = inside + $increment , increase = increase + $increment,total = total + $increment  WHERE id = '$id'";
     

    }else if($decrement == 1)
    {
            $sql = "UPDATE counter SET inside = inside - $decrement , decrease = decrease + $decrement WHERE id = '$id'";
   

    }
             if ($conn->query($sql) === TRUE) {
        echo "Value updated successfully";
        //echo $id;
      //  echo "$did";

    } else {
        echo "Error updating value: " . $conn->error;
    }
//echo $increment;
//echo $decrement;
    
}

$conn->close();

?>
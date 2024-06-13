<?php

    $connect = mysqli_connect("localhost","sumandas","password","student");
    if($connect)
    {
        echo"connection established";
    }
    else{
        echo"connection not established";
    }

?>
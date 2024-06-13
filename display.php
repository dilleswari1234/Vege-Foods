<?php
session_start();
echo "Welcome ".$_SESSION['user_name'];
?>



<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background: #D071f9;
            }
            table{
                background-color: white;
            }
            .update, .delete{
                background-color: green;
                color: white;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 23px;
                width: 80px;
                font-weight: bold;
                cursor: pointer;
            }
            .delete{
                background-color: red;
            }
        </style>
    </head>

    <?php
        include("connection.php");
        error_reporting(0);
        $userprofile = $_SESSION['user_name'];

        if($userprofile == true)
        {

        }
        else
        {
            header('location:login.php');
        }

        $query = "SELECT * FROM FORM5;";
        $data = mysqli_query($conn, $query);

        $total = mysqli_num_rows($data);
    ?>
</html>
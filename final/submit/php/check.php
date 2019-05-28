<?php
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "final_test";


   
    $db =  new mysqli($servername, $username, $password, $dbname);
    
    $product_name = "";
    $product_price = $_POST['product_price'];
    @$product_color = $_POST['product_color'];
    @$product_catagory = $_POST['product_catagory'];
    $description = $_POST['description'];

    $file_error ="";
    $error ="";
    $description_error ="";
    $price_error="";
    $color_error="";
    $catagory_error="";

    // if(empty($file_error)){
    //     $file_error .="<p style='color:red;'>Please input your file</p>";
    // }

    if(empty($_POST['product_name'])){
        $error .= "<span class='_required-badge'>Required</span>";
    }
    else{
        $product_name = $_POST['product_name'];
    }


    if(@$file_error=="" && @$name_error=="" && @$phone_error=="" && @$email_error=="" && @$address_error=="" 
    && @$birth_error=="" && @$gra_error==""){
        header('location: upload.php');
    }

    $data = array(
        "error" => $error
    );

    echo json_encode($data);
?>
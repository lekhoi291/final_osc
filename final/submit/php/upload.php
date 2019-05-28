<?php
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "final_test";

if (isset($_POST['submit'])){
    $target_dir = dirname(dirname(__FILE__)).'/store/';
    $target = $target_dir . basename($_FILES['image_file']['name']);

    $db =  new mysqli($servername, $username, $password, $dbname);
    $image = $_FILES['image_file']['name'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    @$product_color = $_POST['product_color'];
    @$product_catagory = $_POST['product_catagory'];
    $description = $_POST['description'];
    $product_status = $_POST['product_status'];

    $file_error ="";
    $name_error ="";
    $description_error ="";
    $price_error="";
    $color_error="";
    $catagory_error="";
    

    if(empty($image)){
        $file_error ="<p style='color:red;'>Please input your file &#10008;</p>";
    }

    if(empty($product_name)){
        $name_error = "<span class='_required-badge'>Required</span>";
    }

    if(empty($description)){
        $description_error = "<span class='_required-badge'>Required</span>";
    }

    $price_pattern = '/^[0-9]{1,}$/m';
    if(empty($product_price)){
        $price_error = "<span class='_required-badge'>Required</span>";
    }
    else if(!preg_match($price_pattern, $product_price)){
        $price_error = "<span class='_required-badge'>Not a Number</span>";
    }

    if($product_color == NULL){
        $color_error = "<span class='_required-badge'>Required</span>";       
    }

    if($product_catagory == NULL){
        $catagory_error = "<span class='_required-badge'>Required</span>";
    }

    if(@$file_error=="" && @$name_error=="" && @$description_error=="" && @$price_error=="" 
    && @$color_error=="" && @$catagory_error==""){
        $sql = "INSERT INTO PRODUCT (image_file, product_name, catagory, color, price, description, product_status) 
        VALUE ('$image', '$product_name', '$product_catagory', '$product_color', '$product_price', '$description', '$product_status')";
        $db->query($sql) === TRUE;
    
        if(move_uploaded_file($_FILES['image_file']['tmp_name'], $target))
        {
            header("location: ../index.php");
        }
    }
}
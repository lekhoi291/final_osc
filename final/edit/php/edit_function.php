<?php
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "final_test";

if (isset($_POST['submit'])){
    $db =  mysqli_connect($servername, $username, $password, $dbname);
    $title = $_POST['product_name'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    $sql = "UPDATE PRODUCT SET product_name = '$title', description= '$description' WHERE id=$id ";

    if($title  == NULL){
        $title_error = "<span class='_required-badge'>Required</span>";
    }
    if($description == NULL){
        $description_error = "<span class='_required-badge'>Required</span>";
    }

    if(@$title_error=="" and $description_error==""){
        mysqli_query($db, $sql);
        // header("location:../../gallery/gallery.html");
        header("location: ../view/view.php?id=$id");
    }
}
?>
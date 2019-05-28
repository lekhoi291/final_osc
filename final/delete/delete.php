<?php
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "final_test";
$id = $_GET['id'];
$db = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM PRODUCT WHERE id=$id";
$sql1 = "DELETE FROM PRODUCT WHERE id=$id";
$result = mysqli_query($db, $sql);

while($row = mysqli_fetch_array($result)){
    $image_file = $row['image_file'];
    $filepath = "../submit/store/$image_file";
    unlink($filepath);
    mysqli_query($db, $sql1);
    header('location: ../index.php?success=1');
}


?>
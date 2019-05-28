<?php
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "final_test";
$db = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM PRODUCT";
$result = mysqli_query($db, $sql);
$numbercheckbox = count($_POST['checkbox']);
$i = 0;
while($row = mysqli_fetch_array($result)){
    if(isset($_POST['delete'])){
        $checkbox= $_POST['checkbox'];
        while($i<$numbercheckbox){
            $keytodelete = $_POST['checkbox'][$i];
            $sql1 = "DELETE FROM PRODUCT WHERE id=$keytodelete";
            mysqli_query($db, $sql1);
            $i++;
        }
        unlink($filepath);
        header('location: ../index.php?success=1');
    }
}
?>
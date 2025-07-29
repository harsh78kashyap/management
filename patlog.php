<?php

$id = $_POST['userid'];
$pass = $_POST['password'];

$conn = new mysqli("localhost","root","","hms");

if(mysqli_connect_error())
{
die('connect error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else{
    $sql = "SELECT password from patient WHERE pat_id='$id'";
    $result = $conn->query($sql);
    
    $row = $result-> fetch_assoc();
    if($row==NULL){
        echo "Entered wrong id or password. Please check it.";
        $conn -> close();
        die();
    }
    if($pass == $row['password']){
        include 'patPro1.php';
    }
    else{
        include 'wrongpass.html';
    }
    $conn -> close();
}

?>
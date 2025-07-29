
<?php

$password=$_POST['password'];
$conn = new mysqli("localhost","root","","hms");

if(mysqli_connect_error())
{
die('connect error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
$sql= "SELECT password FROM admin WHERE adminid=1";
$result = $conn->query($sql);
    $row=$result-> fetch_assoc();
    if($row['password']==$password){
        include 'adedit.php';
    }else{
        include 'wrongpass.html';
        die();
    }

?>

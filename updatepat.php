<?php

$id=$_POST['identity'];

$conn = new mysqli("localhost","root","","hms");

if(mysqli_connect_error())
{
die('connect error('. mysqli_connect_errno().')'. mysqli_connect_error());
}

if(!empty($_POST['fullname'])){
    $update=$_POST['fullname'];
    $sql = "UPDATE patient SET name='$update' WHERE pat_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['fathername'])){
    $update=$_POST['fathername'];
    $sql = "UPDATE patient SET fathername='$update' WHERE pat_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['gender'])){
    $update=$_POST['gender'];
    $sql = "UPDATE patient SET gender='$update' WHERE pat_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['age'])){
    $update=$_POST['age'];
    $sql = "UPDATE patient SET age='$update' WHERE pat_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['blood'])){
    $update=$_POST['blood'];
    $sql = "UPDATE patient SET bloodg='$update' WHERE pat_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['address'])){
    $update=$_POST['address'];
    $sql = "UPDATE patient SET address='$update' WHERE pat_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['mnum'])){
    $update=$_POST['mnum'];
    $sql = "UPDATE patient SET mobile='$update' WHERE pat_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['email'])){
    $update=$_POST['email'];
    $sql = "UPDATE patient SET email='$update' WHERE pat_id=$id";
    $conn->query($sql);
}

echo "updated Successfully";

$conn->close();



?>
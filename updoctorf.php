<?php

$id=$_POST['id'];

$conn = new mysqli("localhost","root","","hms");

if(mysqli_connect_error())
{
die('connect error('. mysqli_connect_errno().')'. mysqli_connect_error());
}

if(!empty($_POST['name'])){
    $update=$_POST['name'];
    $sql = "UPDATE doctor SET name='$update' WHERE doc_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['department'])){
    $update=$_POST['department'];
    $sql = "UPDATE doctor SET department='$update' WHERE doc_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['gender'])){
    $update=$_POST['gender'];
    $sql = "UPDATE doctor SET gender='$update' WHERE doc_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['age'])){
    $update=$_POST['age'];
    $sql = "UPDATE doctor SET age='$update' WHERE doc_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['experience'])){
    $update=$_POST['experience'];
    $sql = "UPDATE doctor SET experience='$update' WHERE doc_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['address'])){
    $update=$_POST['address'];
    $sql = "UPDATE doctor SET address='$update' WHERE doc_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['mobile'])){
    $update=$_POST['mobile'];
    $sql = "UPDATE doctor SET mobile='$update' WHERE doc_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['email'])){
    $update=$_POST['email'];
    $sql = "UPDATE doctor SET email='$update' WHERE doc_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['college'])){
    $update=$_POST['college'];
    $sql = "UPDATE doctor SET college='$update' WHERE doc_id=$id";
    $conn->query($sql);
}
if(!empty($_POST['dob'])){
    $update=$_POST['dob'];
    $sql = "UPDATE doctor SET dob='$update' WHERE doc_id=$id";
    $conn->query($sql);
}

echo "updated Successfully";

$conn->close();



?>
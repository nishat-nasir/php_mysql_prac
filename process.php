<?php
session_start();
$mysqli = new mysqli('localhost', 'root','', 'crud') or die (mysqli_error($mysqli));

$update = false;
$name = "";
$first_name = "";
$email = "";
$street = "";
$zip_code = "";
$city = "";

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $zip_code = $_POST['zip_code'];
    $city = $_POST['city'];

    $mysqli-> query("INSERT INTO data (name, first_name, email, street, zip_code, city) VALUES('$name','$first_name','$email','$street','$zip_code', '$city')") or die($mysqli->error);

    $_SESSION['message'] = "Record has been added!";
    $_SESSION["msg_type"] = "success";

    header("location: index.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
      
    $mysqli->query("DELETE FROM data WHERE id=$id") or die ($mysqli->error);

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";
    
    header("location:index.php");
}


if(isset($_GET['edit'])){
    $update = true;
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM data WHERE id = $id") or die($mysql->error());
    $row = $result->fetch_array();
    $name = $row['name'];
    $first_name = $row['first_name'];
    $email = $row['email'];
    $street = $row['street'];
    $zip_code = $row['zip_code'];
    $city = $row['city'];
    
}

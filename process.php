<?php
define("DB_HOST", "192.168.219.159");
"UPDATE mysql.user SET Password=PASSWORD('MyNewPass') WHERE User='root'";
$mysqli = new mysqli('localhost', 'root','', 'crud') or die (mysqli_error($mysqli));

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

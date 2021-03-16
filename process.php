<?php
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
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die ($mysqli->error());
}

<?php
define("DB_HOST", "192.168.219.159");
"UPDATE mysql.user SET Password=PASSWORD('MyNewPass') WHERE User='root'";

$mysqli = new mysqli('localhost', 'root','', 'crud') or die (mysqli_error($mysqli));

$id = 0;
$update = false;
$name = "";
$first_name = "";
$email = "";
$street = "";
$zip_code = "";
$city = "";


// Method -> POST
// Operation -> SAVE data to Database

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


// Method -> GET & DELETE
// Operation -> READ data to DELETE

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
      
    $mysqli->query("DELETE FROM data WHERE id=$id") or die ($mysqli->error);

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";
    
    header("location:index.php");
}


// Method -> GET
// Operation -> READ data to EDIT

if(isset($_GET['edit'])){
    $update = true;
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM data WHERE id = $id") or die($mysqli->error);
    $row = $result->fetch_array();
    $name = $row['name'];
    $first_name = $row['first_name'];
    $email = $row['email'];
    $street = $row['street'];
    $zip_code = $row['zip_code'];
    $city = $row['city'];
    
}

// Method -> POST
// Operation -> UPDATE

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $zip_code = $_POST['zip_code'];
    $city = $_POST['city'];

    $mysqli->query("UPDATE data SET name='$name', first_name='$first_name', email='$email', street='$street', zip_code='$zip_code', city='$city' WHERE id=$id" ) or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
    header('location:index.php');

}

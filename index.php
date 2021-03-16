<!doctype html>
<html lang="en">

    <head>
        <title>PHP Form</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>


        <?php require_once 'process.php'; ?>
        <?php 
                if(isset($_SESSION['message'])):?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
        <?php endif?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS  -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>

        <div class="container">
            <div class="row justify-content-center">

                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" value="<?php echo $first_name; ?>"
                            placeholder="Enter your location">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>"
                            placeholder="Enter your location">
                    </div>
                    <div class="form-group">
                        <label>Street</label>
                        <input type="text" name="street" value="<?php echo $street; ?>"
                            placeholder="Enter your location">
                    </div>
                    <div class="form-group">
                        <label>Zip-Code</label>
                        <input type="text" name="zip_code" value="<?php echo $zip_code; ?>"
                            placeholder="Enter your location">
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <select name="city" id="city">
                            <option value="seoul">Seoul</option>
                            <option value="busan">Busan</option>
                            <option value=incheon>Incheon</option>
                            <option value="degu">Degu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php 
                    if($update == true): ?>
                        <button type="submit" class="btn btn-info">Update</button>
                        <?php else: ?>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <!-- Data Table -->
            <?php 
        $mysqli = new mysqli('localhost', 'root','', 'crud') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
        ?>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>Street</th>
                            <th>Zip-Code</th>
                            <th>City</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php 
                while($row = $result->fetch_assoc()):?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['street']; ?></td>
                        <td><?php echo $row['zip_code']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
                            <a href="index.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <?php
        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        ?>
        </div>
    </body>

</html>

<?php
session_start();
if(!empty($_SESSION['login'])){
    header("location:homepage.php");
}


if(isset($_GET['errors'])){
    $errors = json_decode($_GET["errors"], true);

}

if(isset($_GET['old_data'])){
    $old_data = json_decode($_GET["old_data"], true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form action="login_validation.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email"
                    value="
                    <?php 
                        if(!empty($old_data["email"])) {
                            echo $old_data["email"];
                        }
                    ?>"
                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <label style="color: red; font-weight: bold">
                    <?php 
                        if(!empty($errors["email"])) {
                            echo $errors["email"];
                        }
                    ?>

                </label>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <label style="color: red; font-weight: bold">
                    <?php 
                        if(!empty($errors["password"])) {
                            echo $errors["password"];
                        }
                    ?>

                </label>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
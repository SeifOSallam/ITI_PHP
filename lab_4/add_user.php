<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <div class="w-50 mx-auto ">
        <form action="add_user_validation.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
            <?php if (!empty($errors['name'])) echo "<div class='text-danger'>{$errors['name']}</div>"; ?>
            </div>

        <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email"
                    value="
                    <?php 
                        if(!empty($old_data["email"])) {
                            echo $old_data["email"];
                        }
                    ?>
                    "
                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <label style="color: red; font-weight: bold">
                    <?php 
                        if(!empty($errors["email"])) {
                            echo $errors["email"];
                        }
                    ?>

                </label>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
            <label style="color: red; font-weight: bold">
                    <?php 
                        if(!empty($errors["password"])) {
                            echo $errors["password"];
                        }
                    ?>

                </label>
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
            <label style="color: red; font-weight: bold">
                    <?php 
                        if(!empty($errors["confirmPassword"])) {
                            echo $errors["confirmPassword"];
                        }
                    ?>

                </label>
        </div>

        <div class="form-group">
            <label for="app">Room No:</label>
            <select class="form-control" id="app" name="app">
            <option value="male">Application1</option>
            <option value="male">Application2</option>
            <option value="male">Cloud</option>
            </select>
            <?php if (!empty($errors['app'])) echo "<div class='text-danger'>{$errors['app']}</div>"; ?>
        </div>

        <div class="form-group">
            <label for="ext">EXT:</label>
            <input type="text" class="form-control" id="ext" name="ext">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Profile picture</label>
                <input type="file" name="image"
                    class="form-control"  aria-describedby="emailHelp">
                <label style="color: red; font-weight: bold">
                <?php 
                    if(!empty($errors["image"])) {
                        echo $errors["image"];
                    }
                ?>

            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
<?php 
    require_once './user_crud.php';
    $id = $_GET['id'];
    $user = select_single_user($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class='w-50 mx-auto mt-5'>
        <?php echo "<h1>Updating User {$id}</h1>";?>
        <form action='edit_user_func.php' method='POST'>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="<?php echo $user['name'];?>" id="exampleInputName" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="<?php echo $user['email'];?>" id="exampleInputEmail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword">
            </div>
            <div class="mb-3">
                <label for="exampleInputRoomNum" placeholder="<?php echo $user['room_num'];?>" class="form-label">Room Number</label>
                <input type="text" name="room_num" class="form-control" id="exampleInputRoomNum">
            </div>
            <div class="mb-3">
                <label for="exampleInputExt" placeholder="<?php echo $user['ext'];?>" class="form-label">Extension</label>
                <input type="text" name="ext" class="form-control" id="exampleInputExt">
            </div>
            <input type="hidden" name="id" value="<?php echo $user['id'];?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
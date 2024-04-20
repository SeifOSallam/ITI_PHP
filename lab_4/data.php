<?php 
    require_once './user_crud.php';
    $rows = select_users();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
        table, td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php 
        if (!empty($rows)) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Password</th>";
            echo "<th>Room_Num</th>";
            echo "<th>EXT</th>";
            echo "<th>Profile Picture</th>";
            echo "</tr>";
            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['password']}</td>";
                echo "<td>{$row['room_num']}</td>";
                echo "<td>{$row['ext']}</td>";
                echo "<td>{$row['profile_pic']}</td>";
                echo "<td class='d-flex px-0'>
                    <form method='POST' action='edit_user_form.php?id={$row['id']}'>
                        <input type='submit' value='Edit' class='btn btn-warning'>
                    </form>
                    <form method='POST' action='delete_user_func.php?id={$row['id']}'>
                        <input type='submit' value='Delete' name='delete' class='btn btn-danger'>
                    </form>
                </td>";
                echo "</tr>";
            }
            
            echo "</table>";
        }
    ?>
</body>
</html>
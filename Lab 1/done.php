<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Done</title>
    <link rel="stylesheet" href="done.css">
</head>
<body>
    <?php 
        echo "Thanks " . ($_POST['gender'] == "male" ? "Mr " : "Miss ") . $_POST['firstName'] . " " . $_POST['lastName']  . "<br/>";
        echo "Name: " . $_POST['firstName'] . " " . $_POST['lastName']  . "<br/>";
        echo "Address: " . $_POST['address']  . "<br/>";
        echo "Your skills: ";
        if(isset($_POST['skill'])) {
            foreach ($_POST['skill'] as $skill) {
                echo $skill . " ";
            }
        }
        echo "<br/>";
        echo "Department: " . $_POST['department'];
    ?>
</body>
</html>
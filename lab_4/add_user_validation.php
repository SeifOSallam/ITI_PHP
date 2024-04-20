<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once './user_crud.php';
        function sanitize_input($input)
        {
            $input = trim($input);
            $input = htmlspecialchars($input);
            return $input;
        }
        function save_data($data, $filename){
            $fileobj= fopen($filename, "a");
            $res=fwrite($fileobj, $data);
            fclose($fileobj);
            return $res;
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_FILES['image']['tmp_name'])){
                $filename = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $saved = move_uploaded_file($tmp_name, "images/{$filename}");
                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                if (!in_array($file_extension, $allowed_extensions)) {
                    $errors['image'] = "Invalid file format. Only JPG, JPEG, PNG, and GIF files are allowed.";
                } else {
                    $saved = move_uploaded_file($tmp_name, "images/{$filename}");
                    echo "<img  width='300' height='300' src='images/{$filename}'> ";
                }
            }else{
                $errors['image'] = "image is required";
            }
            if (empty($_POST["name"])) {
                $errors['name'] = "Name is required";
            } else {
                $Name = sanitize_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $Name)) {
                    $errors['name'] = "Only letters and white space allowed";
                }
            }
            if (empty($_POST["email"])) {
                $errors['email'] = "Email is required";
            } else {
                $email = sanitize_input($_POST["email"]);
                // $pattern = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$";
                
                //////1//////
                // if (!preg_match($pattern, $email)) {
                //     $errors['email'] = "Invalid email format";
                // }
        
                //////2//////
                // preg_match_all($pattern, $email, $matches);
        
                // if (!empty($matches[0])) {
                //     // Email is valid
                //     return true;
                // } else {
                //     // Email is invalid
                //     return false;
                // }
                
                 //////3//////
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Invalid email format";
                }
            }
            if (empty($_POST["app"])) {
                $errors['app'] = "Room No is required";
            } else {
                $app = sanitize_input($_POST["app"]);
            }
            $password = isset($_POST["password"]) ? $_POST["password"] : "";
            $confirmPassword = isset($_POST["confirmPassword"]) ? $_POST["confirmPassword"] : "";
            
            if (empty($password)) {
                $errors['password'] = "Password is required";
            } elseif ($password !== $confirmPassword) {
                $errors['confirmPassword'] = "Passwords do not match";
            }
            
            $password = sanitize_input($password);
        
            if (!empty($errors)) {
                $errors = json_encode($errors);
                header("Location: add_user.php?errors={$errors}");
                exit;
            } else {
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $data = [];
                $data['name'] = $_POST['name'];
                $data['email'] = $_POST['email'];
                $data['password'] = $pass;
                $data['app'] = $_POST['app'];
                $data['ext'] = $_POST['ext'];
                $data['image'] = $_FILES['image']['name'];
                add_user($data);
                $data = json_encode($data);
                $res=save_data($data.PHP_EOL, "users.txt");

                header('Location: data.php');
            }
        } 
        else {
            echo "Invalid request method.";
        }
    ?>
</body>
</html>
<?php
    $valid = true;
    $errors = [];
    function save_data($data, $filename){
        $fileobj= fopen($filename, "a");
        $res=fwrite($fileobj, $data);
        fclose($fileobj);
        return $res;
    }
    
    if (empty($_POST['firstName'])) {
        $errors["firstName"] = "First name can't be empty";
        $valid = false;
    }
    
    if (empty($_POST['lastName'])) {
        $errors["lastName"] = "Last name can't be empty";
        $valid = false;
    }
    
    if (empty($_POST['email'])) {
        $errors["email"] = "Email can't be empty";
        $valid = false;
    }
    
    if (empty($_POST['gender'])) {
        $errors["gender"] = "Gender can't be empty";
        $valid = false;
    }

    if ($valid) {
        $data = json_encode($_POST);
        $res=save_data($data.PHP_EOL, "users.txt");
        header("Location: /ITI_PHP/done.php?data={$data}");
    }
    else {
        $errors = json_encode($errors);
        echo $errors;
        header("Location: /ITI_PHP/registration.php?errors={$errors}");
    }
?>
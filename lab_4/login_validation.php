<?php


$usersFile = file_get_contents('users.txt');
$users = explode(PHP_EOL, $usersFile);

$found = false;

foreach ($users as $user) {
    $userInfo = json_decode($user);
    echo $_POST['email'];
    if ($_POST['email'] == $userInfo->email && password_verify($_POST['password'], $userInfo->password)) {
        $found = true;
        break;
    }
}

if ($found) {
    session_start();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['login'] = true;
    setcookie("name", $_POST['email'], time()+3600, '/', "", 0);
    header("location: home.php");
} else {
    header("Location: login.php");
}
?>
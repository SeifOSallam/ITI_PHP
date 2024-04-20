<?php 
    require_once './user_crud.php';
    update_user($_POST['id'], $_POST);
    header('Location: data.php');
?>
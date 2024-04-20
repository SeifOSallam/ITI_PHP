<?php 
    require_once './user_crud.php';
    delete_user($_GET['id']);
    header("Location: data.php");
?>
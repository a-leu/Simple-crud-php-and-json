<?php
require 'users.php';
include 'partials/header.php';

$userId = $_GET['id'];
$user = checkGetUserID($userId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = updateUser($_POST, $userId);
    uploadPhoto($_FILES['photo'], $user);
    header('Location: index.php');
}

include '_form.php';
include 'partials/footer.php';

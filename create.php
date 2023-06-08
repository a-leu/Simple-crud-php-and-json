<?php
require 'users.php';
include 'partials/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = createUser($_POST);
    uploadPhoto($_FILES['photo'], $user);
    header('Location: index.php');
}

include '_form.php';
include 'partials/footer.php';
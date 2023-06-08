<?php
require 'users.php';
include 'partials/header.php';

if (!isset($_POST['id'])) {
    include 'partials/not_found.php';
    exit;
}

deleteUser($_POST['id']);
header('Location: index.php');
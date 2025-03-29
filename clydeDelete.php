<?php

require 'clyderouter.php';
$id = $_GET['id'];
$user = deleteUser($id);

if($user) {
    header("location: /");
}
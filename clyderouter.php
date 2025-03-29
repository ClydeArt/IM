<?php
require_once 'controller.php';

function editUsers($users)
{
    $db = new DbController();
    if ($db->getState()) {
        $conn = $db->getDb();
        $stmt = $conn->prepare("UPDATE users SET fname = :fname, lname = :lname, mname = :mname, age = :age, address = :address, contact = :contact WHERE id = :id;");
        $stmt->bindParam(":fname", $users['fname']);
        $stmt->bindParam(":lname", $users['lname']);
        $stmt->bindParam(":mname", $users['mname']);
        $stmt->bindParam(":age", $users['age']);
        $stmt->bindParam(":address", $users['address']);
        $stmt->bindParam(":contact", $users['contact']);
        $stmt->bindParam(":id", $users['id']);
        $stmt->execute();
        return true;
    } else {
        return false;
    }
}

function saveUsers($users)
{
    $db = new DbController();
    if ($db->getState()) {
        $conn = $db->getDb();
        $stmt = $conn->prepare("INSERT INTO users(fname,lname,mname,age,address,contact) VALUES(:fname,:lname,:mname,:age,:address,:contact)");
        $stmt->bindParam(":fname", $users['fname']);
        $stmt->bindParam(":lname", $users['lname']);
        $stmt->bindParam(":mname", $users['mname']);
        $stmt->bindParam(":age", $users['age']);
        $stmt->bindParam(":address", $users['address']);
        $stmt->bindParam(":contact", $users['contact']);
        $stmt->execute();
        return true;
    } else {
        return false;
    }
}

function getUsers() 
{
    $db = new DbController();

    if ($db->getState()) {
        $conn = $db->getDb();
        $stmt = $conn->prepare("SELECT * FROM users;");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } else {
        return false;
    }
}

function getUser($id) 
{
    $db = new DbController();

    if ($db->getState()) {
        $conn = $db->getDb();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id;");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    } else {
        return false;
    }
}

function deleteUser($id) {
    $db = new DbController();

    if ($db->getState()) {
        $conn = $db->getDb();
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id;");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return true;
    } else {
        return false;
    }
}
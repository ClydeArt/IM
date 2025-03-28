<?php
require_once 'controller.php';

function saveUsers($users)
{
    $db = new DbController();

    if ($db->getState() == true) {
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

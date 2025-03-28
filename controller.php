<?php
require_once 'connection.php';

class DbController extends Database
{
    public function getState()
    {
        return parent::getState();
    }
    public function getErrMsg()
    {
        return parent::getErrMsg();
    }
    public function getDb()
    {
        return parent::getDb();
    }
}
?>
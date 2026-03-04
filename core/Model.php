<?php
class Model {
    protected mysqli $conn;

    public function __construct() {
        $this->conn = $GLOBALS['conn'];
    }
}

<?php

function db_connect()
{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "gym_manager";
    try {
        $conn = new PDO("mysql:host=".$host.";dbname=".$db_name, $user, $pass);
        // set the PDO error mode to exception
        $conn->exec("SET CHARACTER SET utf8");
        $conn->exec("SET CHARACTER SET NAMES utf8");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $e) {
        return false;
    }
}
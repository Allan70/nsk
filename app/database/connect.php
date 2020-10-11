<?php

function connect()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
$db_name = 'blog';
    try {
        $conn = new PDO(
            "mysql:
            host=" . $host . ";
            dbname=" . $db_name, // database name
            $user, // database username
            $pass//, //database password
        //self::$options //additional options
        );
        return $conn;
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}



    function dd($value)//to be deleted
    {
        echo "<pre>", print_r($value, true), "</pre>";
        die();
    }
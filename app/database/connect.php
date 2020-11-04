<?php

function connect()
{
    $conf=readIni();
    $host = $conf['DATABASE_HOST'];
    $user = $conf['DATABASE_USER'];
    $pass = $conf['DATABASE_PASSWORD'];
    $db_name = $conf['DATABASE_NAME'];
    try {
        $conn = new PDO(
            "mysql:
            host=" . $host . ";
            dbname=" . $db_name, // database name
            $user, // database username
            $pass, //database password
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
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

    function readIni(){
        $document=__DIR__;
        $root=$document.'/../../';
        $filename=$root.'config.ini';
        $configs=[];
        if(file_exists($filename)){
            $configs=parse_ini_file($filename);
        }
        return $configs;
    }
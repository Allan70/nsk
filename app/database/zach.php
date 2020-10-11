<?php

require('connect.php');



function dd($value)//to be deleted
{
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}

function executeQuerry($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

function execQuerry($sql)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    return $stmt;
    $conn->real_query($sql);  
}

function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions))
    {
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
      return $records;
    }else{
        //return records that match conditions...
        //$sql = "SELECT * FROM $table WHERE username= Allan AND admin=1"; 

        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i == 0){
                $sql = $sql . " WHERE $key=?";        
            }else{
                $sql = $sql . " AND $key=?"; 
            }
            $i++;
        }
        $stmt = executeQuerry($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;

    }
}



function selectOne($table, $conditions)
{ 
    global $conn;
    $sql = "SELECT * FROM $table";
    

    $i = 0;
    foreach ($conditions as $key => $value) {
    if ($i == 0){
        $sql = $sql . " WHERE $key=?";        
    }else{
        $sql = $sql . " AND $key=?"; 
         }
        $i++;
    }

    $sql = $sql . " LIMIT 1";
    $stmt = $stmt = executeQuerry($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

function create($table, $data)
{
    global $conn;

    //$sql = "INSERT INTO users SET username=?, admin=?, email=?, password=?"
    
    $sql = "INSERT INTO %s (%s) VALUES (%s)";

    
    $sql = sprintf(
        'insert into %s (%s) value (%s)',
        $table,
        implode(',', array_keys($data)),
        implode(',', array_values($data))
    );
    
    $stmt = execQuerry($sql);
    return $stmt;
    $id = $stmt->insert_id;
    return $id;
}

$data = [
    'admin' => 1,
    'username' => 'Abere',
    'email' => 'aabere70@gmail.com',
    'password' => 'allan'
];

$id = create('users', $data);
dd($id);
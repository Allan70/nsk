<?php
include 'database/queryBuilder.php';


//login
if(isset($_POST['login_btn']) || $_GET['action'] === 'login'){
    if(is_null($_POST['username'])){
        dd('Please provide a username');
    }
    if(is_null($_POST['password'])){
        dd('Please provide a password');
    }
    $username=$_POST['username'];
    $password=$_POST['password'];
    $res=findColumn('users',['username'=>$username,'password'=>$password]);
    if($res['count']>0){
        redirect($_SERVER['HTTP_ORIGIN'].'/single.php');
    }else{
        dd('Login unsuccessful, check your credentials and try again.');
    }
}

//register
if(isset($_POST['register_btn']) || $_GET['action'] === 'register'){
    if(is_null($_POST['username'])){
        dd('Username cannot be empty.');
    }
    if(is_null($_POST['email'])){
        dd('Email cannot be empty.');
    }
    if(is_null($_POST['password'])){
        dd('Password field cannot be empty.');
    }
    if(is_null($_POST['passwordConf'])){
        dd('Confirm password field cannot be empty.');
    }
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $passwordConf=$_POST['passwordConf'];
    if($password!==$passwordConf){
        dd('Please ensure you have confirmed your password.');
    }
    $record=save('users',['username'=>$username,'password'=>$password,'email'=>$email]);
    if($record==1){
        redirect($_SERVER['HTTP_ORIGIN'].'/single.php');
    }else{
        dd('Registration failed.');
    }
}

if($_GET['action'] === 'create-post'){
    $title=$_POST['title'];
    $body=$_POST['body'];
    $image=$_FILES['image'];
    $video=$_FILES['video'];
    $topic=$_POST['topic'];
    if(is_null($title)){
        dd('Title cannot be empty.');
    }
    if(is_null($body)){
        dd('Body cannot be empty.');
    }
    if(is_null($topic)){
        dd('Topic cannot be empty.');
    }
}

function redirect($path){
    header('Location:'.$path);
}
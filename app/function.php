<?php
include 'database/queryBuilder.php';

$ROOT= '/../';


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

//create post
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
    if(is_null($image)){
        dd('Image cannot be empty.');
    }
    $image=uploadFile($image);
    $video=uploadFile($video);
    $data=[
        'title'=>$title,
        'topic'=>$topic,
        'body'=>$body,
        'image'=>$image,
        'video'=>$video
    ];
    if(save('posts',$data)==1){
        dd('Post created successfully');
    }
}

// create topic
if($_GET['action']='create-topic'){
    $name=$_POST['title'];
    $body=$_POST['body'];
    $data=[
        'name'=>$name,
        'body'=>$body
    ];
    dd(save('topic',$data));
}

function redirect($path){
    header('Location:'.$path);
}

function uploadFile($file,$filename=null,$path=null){
    global $ROOT;
    $ROOT=__DIR__.'/../';
    if(is_null($path)){
        $path=$ROOT.readIni()['UPLOADS_PATH'];
    }
    if(is_null($filename)){
        $filename=$file['name'];
    }
    if(file_exists($path.'/'.$filename)){
        $ext = end((explode('.',$file['name'])));
        $filename=md5(mt_rand()).'.'.$ext;
    }

    if(!file_exists($path) && !is_dir($path)){
        if (!mkdir($path) && !is_dir($path)) {
            dd('Directory "%s" was not created', $path);
        }
    }

    // upload the file
    if(move_uploaded_file($file['tmp_name'],$path.'/'.$filename)){
        return $path.'/'.$filename;
    }else{
        echo 'failed</br>';
        echo $path.'/'.$filename;
        echo '<br>';
        dd($file);
    }
}
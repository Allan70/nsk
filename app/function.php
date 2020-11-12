<?php
    @session_start();
include 'database/queryBuilder.php';

$ROOT= '/../';


//login
if($_GET['action'] === 'login'){
    if(is_null($_POST['username'])){
        dd('Please provide a username');
    }
    if(is_null($_POST['password'])){
        dd('Please provide a password');
    }
    $username=$_POST['username'];
    $password=$_POST['password'];
    $res=findColumn('users',['username'=>$username]);
    $_SESSION['logged_in']=true;
    $_SESSION['user_id']=$res['result'][0]->email;
    if($res['count']>0 && password_verify($password,$res['result'][0]->password)){
        redirect($_SERVER['HTTP_ORIGIN'].'/admin/posts/index.php');
    }else{
        dd('Login unsuccessful, check your credentials and try again.');
    }
}

//register
if($_GET['action'] === 'register'){
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
    $password=password_hash($_POST['password'],CRYPT_BLOWFISH);
    $record=save('users',['username'=>$username,'password'=>$password,'email'=>$email]);
    if($record==1){
        $_SESSION['logged_in']=true;
        $_SESSION['user_id']=$email;
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
if($_GET['action']==='create-topic'){
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

// list users
if($_GET['action']==='list-users'){
    $users=All('users');
    echo json_encode($users);
    return;
}

//list posts
if($_GET['action']==='list-blogs'){
    $blogs=All('posts');
    echo json_encode($blogs);
}

if($_GET['action']==='list-posts-latest'){
    $res=orderedLatest('posts');
    echo json_encode($res);
}

if($_GET['action']==='list-posts-topic' && isset($_GET['topic'])){
    $res=orderedLatestWhere('posts','topic="'.$_GET['topic'].'"');
    echo json_encode($res);
}

//list topics
if($_GET['action']==='list-topics'){
    $topic=All('topic');
    echo json_encode($topic);
}

function uploadFile($file,$filename=null,$path=null){
    global $ROOT;
    $ROOT=__DIR__.'/../';
    if(is_null($path)){
        $path='../uploads/';
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

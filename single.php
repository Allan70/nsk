<?php
    @session_start();
    include("path.php");
    include "app/function.php";
    $result=null;
    if($_GET['action'] === 'view_post' && isset($_GET['post'])){
        $result=Select($_GET['post'],'posts');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/c6b78effb2.js" crossorigin="anonymous"></script>

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Libre+Caslon+Display&family=Lora:ital@1&display=swap"
          rel="stylesheet">


    <!--Css-->
    <link rel="stylesheet" href="assets/css/style.css?v=12">

    <title><?= $result->title; ?></title>
</head>
<body>

<!--FAcebook Page plug-in-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0"
        nonce="0NDQ8e3E"></script>

<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
<!--page wrapper-->
<!--page wrapper-->


<!--Content-->
<div class="content clearfix">

    <!--Main Content Wrapper-->
    <div class="main-content-wrapper">
        <div class="main-content single">
            <div class="post-title">
                <h1><?= $result->title; ?></h1>
            </div>
            <!--Author-->
            <h6> By | <?= $result->author ?> </h6>

            <div class="post-content">
                <img src="<?= $result->image ?>" alt="Image">
               <p><?= $result->body ?></p>
                <video src="<?= $result->video?>"></video>
            </div>

        </div>
    </div>
    <!--Side bar-->
    <div class="side-bar single">
        <!-- Face book-->
        <div class="fb-page" data-href="https://www.facebook.com/Monkeybee-Kenya-101777691671201" data-tabs=""
             data-width="" data-height="" data-small-header="false" data-adapt-container-width="true"
             data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/Monkeybee-Kenya-101777691671201" class="fb-xfbml-parse-ignore"><a
                        href="https://www.facebook.com/Monkeybee-Kenya-101777691671201">Monkeybee Kenya</a></blockquote>
        </div>
        <!--popular posts-->
        <div class="popular">
            <h1 class="section-title">
                Popular Posts
            </h1>

            <div class="post clearfix">
                <img src="assets/images/pic 1 (17).png" alt="">
                <a href="#" class="title"><h4>How to overcome your fears</h4></a>
            </div>
            <div class="post clearfix">
                <img src="assets/images/pic 1 (16).png" alt="">
                <a href="#" class="title"><h4>How to overcome your fears</h4></a>
            </div>
            <div class="post clearfix">
                <img src="assets/images/pic 1 (15).png" alt="">
                <a href="#" class="title"><h4>How to overcome your fears</h4></a>
            </div>
            <div class="post clearfix">
                <img src="assets/images/pic 1 (14).png" alt="">
                <a href="#" class="title"><h4>How to overcome your fears</h4></a>
            </div>
            <div class="post clearfix">
                <img src="assets/images/pic 1 (13).png" alt="">
                <a href="#" class="title"><h4>How to overcome your fears</h4></a>
            </div>
            <div class="post clearfix">
                <img src="assets/images/pic 1 (12).png" alt="">
                <a href="#" class="title"><h4>How to overcome your fears</h4></a>
            </div>
        </div>


        <!--Section Topics-->
        <div class="section topics">
            <h2 class="section-title"> Topics</h2>
            <ul>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Artists</a></li>
                <li><a href="#">Web Series</a></li>
                <li><a href="#">Videos</a></li>
                <li><a href="#">Games</a></li>
                <li><a href="#">Shorts</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>

    </div>
    <!--Side bar End-->

</div>
<!--Content-->

<!--Page wrapper-->

<!--Footer-->
<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
<!--Footer-->
<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>

<!--Slick Carousell-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- Custom Script-->
<script src="assets/js/scripts.js"></script>


</body>
</html>
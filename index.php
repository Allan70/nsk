<?php @session_start(); include("path.php"); ?>


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

    <title>Blog</title>

    <!--Video Js link-->
    <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet"/>
    <!--Video Js link-->

    <!--Video Js Javascript-->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <!--Video Js Javascript-->

    <!--Slick CSS-->
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <!--Slick CSS-->

</head>
<body>

<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<!--page wrapper-->


<!--Content-->
<div class="content clearfix">

    <!--*Main Content*-->
    <div class="main-content">
        <h1 style="margin-top: 3em;margin-bottom: 10em;">No recent posts.</h1>

        <h1 class="recent-post-title"> RECENT POSTS
            <hr style="height:4px;border-width:0;color:black;background-color:black;">
        </h1>


        <!-- **Main Content**-->
        <!--      <div class="post clearfix">-->
        <!--        <--Article Image-->
        <!--        <a href="single.html"><img src="assets/images/pic 1 (1).png" alt="" class="post-image"></a>-->
        <!--        <div class="overlay"></div>-->
        <!---->
        <!--        <div class="post-preview">-->
        <!--           <--Category and Author-->
        <!--           <h3><a href="#">Politics | By Allan Abere</a></h3>-->
        <!--          <--Article Title-->
        <!--          <h2><a href="single.html">When You Run Out of Things to Say</a></h2>-->
        <!--          -->
        <!--          <br>-->
        <!--          <br>-->
        <!---->
        <!--        </div>-->
        <!--        -->
        <!--      </div>-->
    </div>
    <!--Side bar-->
    <div class="side-bar">

        <!--Search Section-->
        <div class="section search">
            <h2 class="section-title">Search</h2>
            <form action="index.html" method="post">
                <input type="text" name="search-term" id="" class="text-input" placeholder="Search...">
            </form>
        </div>

        <!--Section Topics-->
        <!-- <div class="section topics">
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
         </div>-->

    </div>

</div>
<!--Content-->

<!--Page wrapper-->

<!--Footer-->

<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>


<!--Slick Carousell-->
<!--  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>-->

<!--Video Js JavascriptCDN-->
<!--    <script src="https://vjs.zencdn.net/7.8.4/video.js"></script>-->
<!--Video Js JavascriptCDN-->

<!-- Custom Script-->
<!--    <script src="assets/js/scripts.js"></script>-->
<script src="assets/js/app.js"></script>
<script>
    $(document).ready(function () {
        Blog.latest();
    });
</script>

</body>
</html>

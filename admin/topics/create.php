<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--Font Awesome-->
   <script src="https://kit.fontawesome.com/c6b78effb2.js" crossorigin="anonymous"></script>

   <!--Google Fonts-->
   <link href="https://fonts.googleapis.com/css2?family=Candal&family=Libre+Caslon+Display&family=Lora:ital@1&display=swap" rel="stylesheet">



   <!--Css-->
   <link rel="stylesheet" href="../../css/style.css"> 
   
   <!-- Admin Styling-->
   <link rel="stylesheet" href="../../css/admin.css">



  <title>Admin Section - Add Topic</title>
</head>
<body>
  <header>
    <div class="logo">
      <h1 class="logo-text"><span>Ni</span>sokoni</h1>
    </div>
    
     <i class="fa fa-bars  menu-toggle"></i>

    <ul class="nav">
      <li>
        <a href="#"><i class="fa fa-user"></i>
            Crazy Cow   
          <i class="fa fa-chevron-down" script="font-size: .8em"></i>
        </a>
        <ul>
          <li><a href="#" class="logout">Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>
<!--Admin Page wrapper-->
  <div class="Admin-wrapper">
      
    <!--Left Sidebar-->
     <div class="left-sidebar">
         <ul>
             <li><a href="../posts/index.php">Manage Posts</a></li>
             <li><a href="../users/index.php">Manage Users</a></li>
             <li><a href="index.php">Manage Topics</a></li>
         </ul>

     </div>
 
    <!--Left Sidebar-->

    <!--Admin Contet-->
    <div class="Admin-content">
        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add Topics</a>
            <a href="index.php" class="btn btn-big">Manage Topics</a>
        </div>
        <div class="content">
            <h2 class="page-title"> Add Topic </h2>
            
            <form action="create.php" method="post">
                <div>
                    <label>Name</label>
                    <input type="text" name="title" class="text-input">
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="body" id="body"></textarea>
                </div>

                <div>
                    <button type="submit" class="btn">Add Topic</button>
                </div>
            </form>
        </div>
      
    </div>

    <!--Admin Contet-->


    </div>
<!--Admin Page wrapper-->




  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
   
  <!--Ckeditor-->
  <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>

  <!-- Custom Script-->
  <script src="../../js/scripts.js"></script>

</body>
</html>
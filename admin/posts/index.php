<?php
    @session_start();
    include '../session_check.php';
?>
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



  <title>Admin Section - Manage Posts</title>
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
             <li><a href="index.php">Manage Posts</a></li>
             <li><a href="../users/index.php">Manage Users</a></li>
             <li><a href="../topics/index.php">Manage Topics</a></li>
         </ul>

     </div>
 
    <!--Left Sidebar-->

    <!--Admin Contet-->
    <div class="Admin-content">
        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add Post</a>
            <a href="index.php" class="btn btn-big">Manage Posts</a>
        </div>
        <div class="content">
            <h2 class="page-title"> Manage Posts</h2>
            <table>
                <thead>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th colspan="3">Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>This is the first Post</td>
                        <td>Allan Abere</td>
                        <td><a href="#" class="edit">edit</a></td>
                        <td><a href="#" class="delete">delete</a></td>
                        <td><a href="#" class="publish">publish</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>This is the first Post</td>
                        <td>Allan Abere</td>
                        <td><a href="#" class="edit">edit</a></td>
                        <td><a href="#" class="delete">delete</a></td>
                        <td><a href="#" class="publish">publish</a></td>
                    </tr>
                </tbody>
                
            </table>
        </div>
      
    </div>

    <!--Admin Contet-->


    </div>
<!--Admin Page wrapper-->




  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

  <!-- Custom Script-->
  <script src="../../assets/js/app.js"></script>
  <script>
      $(document).ready(function(){
          Blog.list();
      });
  </script>

</body>
</html>
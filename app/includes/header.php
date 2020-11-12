<header class="sticky">
    <div class="logo">
      <h1 class="logo-text"><a href="index.php"><span>Ni</span>sokoni</a></h1>
    </div>
    
     <i class="fa fa-bars  menu-toggle"></i>
<ul class="nav">
      <li><a href="#" class="nav-item" onclick="Blog.navigate('politics')" id="politics">Politics</a></li>
      <li><a href="#" class="nav-item" onclick="Blog.navigate('business')" id="business">Business</a></li>
      <li><a href="#" class="nav-item" onclick="Blog.navigate('entertainment')" id="entertainment">Entertainment</a></li>
      <li><a href="#" class="nav-item" onclick="Blog.navigate('life-and-style')" id="life-and-style">Life and Style</a></li>
      <li><a href="#" class="nav-item" onclick="Blog.navigate('sports')" id="sports">Sports</a></li>
      <li><a href="#" class="nav-item" onclick="Blog.navigate('technology')" id="technology">Technology</a></li>
      <li><a href="#">About</a>
        <ul>
        <li><a href="#">Advertise with us</a></li>   
        <li><a href="#">Contact us</a></li>
      </ul>
      </li>
 <!-- <li><a href="#">Sign up</a></li>
      <li><a href="#">Log in</a></li>-->
    <?php
        if(isset($_SESSION['logged_in'])){
            echo '
                    <li>
                    <a href="#">
                      <i class="fa fa-user"></i>
                      Crazy Cow
                      <i class="fa fa-chevron-down" style="font-size: .8em"></i></a>
                    <ul>
                      <li><a href="#">Dashboard</a></li>
                      <li><a href="#" class="logout">Logout</a></li>
                    </ul>
                  </li>
                ';
        }
    ?>
    </ul>
    <div class="social-nav">
      <ul>
        
      <li><a href="#"><i class="fab fa-youtube"></i></a></li>
      <li><a href="#"><i class="fab fa-facebook"></i></a></li>
      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      
    </ul>
      </div>
  </header>

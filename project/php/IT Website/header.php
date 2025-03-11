
<?php

function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
    if($currect_page == $url){
      echo 'active'; //class name in css 
    } 
  }
?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>IT knowlage Hub</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-scholar.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>


        <?php
          if(isset($_SESSION['userid']))
          {
          ?>
          <a href="profile">
            <i class="fa fa-2x fa-user text-primary mr-3"></i>
            <div class="text-left">
              <h6 class="font-weight-semi-bold mb-1">
                Hi ..<?php echo $_SESSION['username']?>/ MyAccount
              </h6>
            </div>
          </a>
          <?php 
          }
          ?>
            
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index" class="logo">
                        <h3 style="color: darkred;">IT KNOWLAGE HUB</h3>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Serach Start ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Serach Start ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li class="scroll-to-section">

                         <li class="scroll-to-section"><a href="index"><h6 style="color:#000000;"> <?php ('index')?>Home</h6></a></li>

                         
                      <li class="scroll-to-section"><a href="services"><h6 style="color:#000000;"> <?php ('services')?>Services</h6></a></li>

                      <li class="scroll-to-section"><a href="courses"><h6 style="color:#000000;"> <?php ('courses')?>Courses</h6></a></li>

                      <li class="scroll-to-section"><a href="team"><h6 style="color:#000000;"><?php ('team')?>Team</h6></a></li>

                      <li class="scroll-to-section"><a href="event"><h6 style="color:#000000;"><?php ('event')?>Events</h6></a></li>

                      <li class="scroll-to-se
                      ction"><a href="contact"><h6 style="color:black;"><?php ('contact')?>contact</h6></a></li>



                      <!---****li class="scroll-to-section"><a href="signup"><h6 style="color:black;">signup</h6></a></li *****-->



            <?php
            if(isset($_SESSION['userid']))
            {
            ?>
              <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="userlogout">Logout</a>
            <?php
            }
            else
            {
            ?>
              <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="login">Join Now</a>
            <?php
            }
            ?>
        
                       
                     
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
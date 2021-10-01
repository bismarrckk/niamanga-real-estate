<?php include"header.php" ?>
<section id="aa-menu-area">
    <nav class="navbar navbar-default main-navbar" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->                                               
          <!-- Text based logo -->
           <a class="navbar-brand aa-logo" href="index.php" style=" font-family: Times New Roman, Times, serif;"> <b>NIAMANGA LIMITED</b></a>
           <!-- Image based logo -->
           <!-- <a class="navbar-brand aa-logo-img" href="index.php"><img src="img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
            <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
            <li class="active"><a href="index.php">HOME</a></li>
            <li><a href="properties.php">PROPERTIES </a></li>
            <li><a href="contact.php">CONTACT</a></li>
          
          </ul>
          </ul>                            
        </div><!--/.nav-collapse -->       
      </div>          
    </nav> 
  </section>
  <!-- End menu section -->
  <!-- Start slider  -->
  <section id="aa-slider">
    <div class="aa-slider-area"> 
      <!-- Top slider -->
      <div class="aa-top-slider">
        <!-- Top slider single slide -->
        <div class="aa-top-slider-single">
          <img src="img/slider/b11.jpg" alt="img">
          <!-- Top slider content -->
          <div class="aa-top-slider-content" align="center" >
          <span class="aa-top-slider-catg" style="color: #fff;font-family: Times New Roman, Times, serif;">OWNING A HOME IS A KEYSTONE OF WEALTH</span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End slider  -->

  

  <!-- About us -->
  <section id="aa-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-about-us-area">
            <div class="row">
              <div class="col-md-5">
                <div class="aa-about-us-left">
                  <img src="img/slider/banner2.jpg" alt="image">
                </div>
              </div>
              <div class="col-md-7">
                <div class="aa-about-us-right">
                  <div class="aa-title">
                    <h2>WHO WE ARE</h2>
                    <span></span>
                  </div>
                  <p style="text-align:justify">Niamanga Limited, offers specialized real estate services in the residential and new development fields, covering sales and lettings as well as property management.An in-house advocate oversees property transactions from Letter of Offer through to final transfer at the Deeds Registry. We offer high level expertise and value-added services.We are perfectly placed to help you find a space for you to call home and look forward to being of service to you.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / About us -->

  <!-- Latest property -->
  <section id="aa-latest-property">
    <div class="container">
      <div class="aa-latest-property-area">
        <div class="aa-title">
          <h2>FEATURED PROPERTIES</h2>
          <span></span>
               
        </div>
        <div class="aa-latest-properties-content">
          <div class="row">
            <?php
            include "database/connection.php";
            $sql="SELECT link,map,location,status,dimensions,p.property_id FROM photos ph,property p where p.property_id=ph.property_id group by ph.property_id order by reg_date DESC limit 9";
              $sql=mysqli_query($conn,$sql);
              while($values = $sql->fetch_assoc()){
                $photo=$values['link'];

               ?>
            <div class="col-md-4">
              <article class="aa-properties-item">
                <a href="property-details.php?id=<?php echo $values['property_id']; ?>" class="aa-properties-item-img">
                 <img src="<?php echo 'admin/'.$photo; ?>" class="img-responsive" alt="property" style="
  height:250px;" /> 
                </a>
                
                <div class="aa-properties-item-content" >
                  <div class="aa-properties-info" style="text-align: center;">
                    <span><?php echo $values['dimensions'];?></i></span><br>
                    <span><a href="<?php echo $values['map'];?>" target="_blank"<i class="fa fa-map-marker" aria-hidden="true"> <?php echo $values['location'];?></i></a></span>
                   
                  </div>
                  <div class="aa-properties-about" style="text-align: center;"> 
                      <a href="property-details.php?id=<?php echo $values['property_id']; ?>" class="aa-secondary-btn">View Details</a>                   
                  </div>
                 
                  
                </div>
              </article>
            </div>
            <?php }  ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Latest property -->

  <!-- Footer -->
 <?php include"footer.php"; ?>
  <!-- / Footer -->

 
  
  <!-- jQuery library -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  <script src="js/jquery.min.js"></script>   
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>   
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
   <!-- mixit slider -->
  <script type="text/javascript" src="js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 

  </body>
</html>
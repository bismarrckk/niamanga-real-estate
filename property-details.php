<?php include"header.php"; ?>
  <!-- End header section -->
  <!-- Start menu section -->
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
          <a class="navbar-brand aa-logo" href="index.php" style=" font-family: Times New Roman, Times, serif;"><b> NIAMANGA LIMITED</b></a>
          <!-- Image based logo -->
          <!-- <a class="navbar-brand aa-logo-img" href="index.php"><img src="img/logo.png" alt="logo"></a> -->                     
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
            <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
            <li><a href="index.php">HOME</a></li>
            <li class="active"><a href="properties.php">PROPERTIES</a></li>
            <li><a href="contact.php">CONTACT</a></li>
          
          </ul>
          </ul>                                 
        </div><!--/.nav-collapse -->       
      </div>          
    </nav> 
  </section>
  <!-- End menu section -->

  <!-- Start Proerty header  -->

  <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>Property Details</h2>
            <ol class="breadcrumb">
            <li><a href="index.php">HOME</a></li>            
            <li class="active">PROPERTY DETAILS</li>
          </ol>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- End Proerty header  -->

  <!-- Start Properties  -->
  <section id="aa-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-properties-content">            
            <!-- Start properties content body -->
            <div class="aa-properties-details">
             <div class="aa-properties-details-img">
              <?php
            include "database/connection.php";
            $property_id=$_GET["id"];
            $sql="SELECT * FROM photos where property_id='$property_id'";
              $sql=mysqli_query($conn,$sql);
              while($values = $sql->fetch_assoc()){
                $photo=$values['link'];
               ?>
               <img src="<?php echo 'admin/'.$photo ?>" alt="img">
               <?php } ?>
             </div>
             <div class="aa-properties-info">
              <div class="col-md-10">
                <?php
                $id=$_GET['id'];
                $sql2="SELECT * FROM property where property_id='$id'";
                $result=$conn->query($sql2);
                while($values=$result->fetch_assoc()){

                   ?>
              <h4>Property details</h4>
              <b>Location:</b>
              <p><span> <a href="<?php echo $values['map'];?>" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"> <?php echo $values['location'];?></i></a></span></p>
              <b>Dimensions:</b>
              <p style="font-size: 16px"><?php echo $values["dimensions"]; ?></p>
              <b>Type of Listing:</b>
              <p style="font-size: 16px"><?php echo $values["listing"]; ?></p>
              <b>Description:</b>
              <p style="font-size: 16px;text-align: justify"><?php echo $values["description"]; ?></p>
              <b>Availability:</b>
              <p style="font-size: 16px"><?php echo $values["status"]; ?></p><br>
             
               <?php
                $video=$values["video"];
                if(!empty($video)){?>
                  <iframe style="width: 95%;height: 300px" class="responsive-iframe" src="<?php echo $video;?>"></iframe>
            <?php }  }?>
          </div>

           
             </div>
             <!-- Properties social share -->
            
             <!-- Nearby properties -->
            
            </div>           
          </div>
        </div>
        <!-- Start properties sidebar -->
        <div class="col-md-4">
          <aside class="aa-properties-sidebar">
            <!-- Start Single properties sidebar -->
          <form action="property-search.php">
            <div class="aa-properties-single-sidebar">
              <h3>Properties Search</h3>
               <div class="aa-single-advance-search">
                  <select id="" name="category">
                   <option selected="" value="0">Category</option>
                     <?php
                  
                      $sql="SELECT category FROM property group by category";
                      $records = $conn->query($sql);
                      while($values = $records->fetch_assoc()){?>
                      ?>
                      <option value="<?php echo $values['category'];?>"><?php echo $values['category'];?></option> 
                      <?php } ?>  
                    </select>
                </div>
                <div class="aa-single-advance-search">
                  <select id="" name="location">
                   <option selected="" value="0">Location</option>
                     <?php
                
                      $sql="SELECT county FROM property group by county";
                      $records = $conn->query($sql);
                      while($values = $records->fetch_assoc()){?>
                      ?>
                      <option value="<?php echo $values['county'];?>"><?php echo $values['county'];?></option> 
                      <?php } ?>  
                    </select>
                </div>
            
                <div class="aa-single-advance-search">
              
                  <select id="" name="rooms">
                   <option selected="" value="0">Rooms</option>
                     <?php
                    
                      $sql="SELECT rooms FROM property group by rooms";
                      $records = $conn->query($sql);
                      while($values = $records->fetch_assoc()){?>
                      ?>
                      <option value="<?php echo $values['rooms'];?>"><?php echo $values['rooms'];?></option> 
                      <?php } ?>  
                    </select>
                
                </div>
                </div>
                <div class="aa-single-advance-search">
                  <input type="submit" value="Search" class="aa-search-btn">
                </div>
              </form>

            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
              <h3>Leasing form</h3>
                <form method="POST" action="">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter your name">
                    
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Email Adress</label>
                    <input type="email" class="form-control" required id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter your email address">
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Number</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="idno" aria-describedby="emailHelp" placeholder="Enter your National ID ">
                   
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Phone number</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="phone" aria-describedby="emailHelp" placeholder="Enter phone number">
                    
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Currently renting at</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="current_renting" aria-describedby="emailHelp" placeholder="Enter current residence">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Contact of current landlord</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="landlord" aria-describedby="emailHelp" placeholder="Enter landlord's contact">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Rent period request(months)</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="period" aria-describedby="emailHelp" placeholder="Enter renting period">
                    
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Date of moving in</label>
                    <input type="date" class="form-control" required id="exampleInputEmail1" name="date" aria-describedby="emailHelp" placeholder="Enter date">
                    
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">No. of Bedrooms Needed</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="bedrooms" aria-describedby="emailHelp" placeholder="Enter number of rooms required">
                    
                  </div>
                   <div class="aa-single-advance-search">
                      <input type="submit" value="submit" name="submit_mail" class="aa-search-btn">
                    </div>
                </form>
                <?php 
                if(isset($_POST['submit_mail'])){
                $house_id=$_GET['id'];
                $from = $_POST['email'];
                $to = 'lease.niamangaltd@gmail.com';
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $id = $_POST['idno'];
                $current_renting = $_POST['current_renting'];
                $landlord=$_POST['landlord'];
                $date = $_POST['date'];
                $bedrooms = $_POST['bedrooms'];
                $subject = "Inquiries about Niamanga Limited properties";

                $message =  "
                            <html>
                            <head>
                            
                            </head>
                            <body>      
                              
                              <p>Hi,my name is ".$name.", I am currently renting at ".$current_renting." and I am looking for a ".$bedrooms." bedroomed house to move into by ".$date.".</p>
                              <p>
                              <ul>
                              <li>Phone Number : ".$phone."</li>
                              <li>EmaiAddress : ".$from."</li>
                              <li>National ID  : ".$id."</li>
                              <li>Landlord's contact : ".$landlord." </li>
                              </ul>
                              
                              <p>click <a href='https://wiltel.co.ke/appartments/view-property.php?id=".$house_id."'>here </a> to view the property in question</p>
                              <p>Regards,<br>".$name.".</p>
                            </body>
                            </html>
                            ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: '.$from. "\r\n";


                $mail_res=mail($to,$subject,$message,$headers);

                if($mail_res){
                $message3 =  "
                            <html>
                            <head>
                            
                            </head>
                            <body>      
                              
                              <p> Hi ".$name.", Thank you for your interest in leasing one of our units.One of our customer specialists will contact you soon to discuss the apartments that are available.
                              <p>
                                  
                              <p>Thank you <br> Lease Manager <br> Valentine</p>
                            </body>
                            </html>
                            ";
                $subject2="We acknowledge the receipt of your mail";
                $from2='lease.niamangaltd@gmail.com';
                $to2=$from;
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: '.$from2. "\r\n";
                $mail_res2=mail($to2,$subject2,$message3,$headers);
                if($mail_res2){
                ?>
                <script>
                  alert("Form submission successful,a copy has been sent to your email!");
                </script>
                 
                <?php
                }
                }
                }
                ?>

            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- / Properties  -->

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
  <script>
$('.aa-properties-details-img').infiniteScroll({
  // options
  path: '.pagination__next',
  append: '.post',
  history: false,
})
</script>
  </body>
</html>
<?php include"header.php"; ?>
<style type="text/css">
  .display-none {
  display:none;
}

</style>
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
          <!-- <a class="navbar-brand aa-logo-img" href="properties.php"><img src="img/logo.png" alt="logo"></a> -->                     
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
            <li><a href="index.php">HOME</a></li>
            <li class="active"><a href="properties.php">PROPERTIES </a></li>
            <li><a href="contact.php">CONTACT</a></li>
            
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
            <h2>Search Results</h2>
            <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>            
            <li class="active">Properties</li>
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
            <!-- start properties content head -->
           <div class="aa-properties-content-body">
              <ul class="aa-properties-nav">
            <!-- Start properties content body -->
            
                <?php
include "database/connection.php";
/////get search query
$location=$_GET['location'];
$category=$_GET['category'];
$rooms=$_GET['rooms'];

////// WE SET UP THE TOTAL images PER PAGE & CALCULATIONS:
$per_page = 12;// Number of images per page, change for a different number of images per page

// Get the page and offset value:
if (isset($_GET['page'])) {
$page = $_GET['page'] - 1;
$offset = $page * $per_page;
}
else {
$page = 0;
$offset = 0;
} 

// Count the total number of images in the table ordering by their id's ascending:
$images = "SELECT count(property_id) FROM property where county like '%$location%' or category like '%$category%' or rooms like '%$rooms%' group by property_id ";
$result = mysqli_query($conn, $images);
$row = mysqli_fetch_array($result);
$total_images = $row[0];

// Calculate the number of pages:
if ($total_images > $per_page) {//If there is more than one page
$pages_total = ceil($total_images / $per_page);
$page_up = $page + 2;
$page_down = $page;
$display ='';//leave the display variable empty so it doesn't hide anything
} 
else {//Else if there is only one page
$pages = 1;
$pages_total = 1;
$display = ' class="display-none"';//class to hide page count and buttons if only one page
} 

////// THEN WE DISPLAY THE PAGE COUNT AND BUTTONS:


// DISPLAY THE images:
//Select the images from the table limited as per our $offet and $per_page total:
$result = mysqli_query($conn, "SELECT dimensions,link,location,status,map,p.property_id FROM photos ph,property p where p.property_id=ph.property_id AND county like '%$location%' or category like '%$category%' or rooms like '%$rooms%' group by p.property_id order by reg_date DESC LIMIT $offset, $per_page");
while($row = mysqli_fetch_array($result)) {//Open the while array loop
//Define the image variable:
$link=$row['link'];
?>
<li style="padding: 0px;">
<article class="aa-properties-item">
<a class="aa-properties-item-img" href="property-details.php?id=<?php echo $row['property_id']; ?>">               
<img style="height: 300px" src="<?php echo 'admin/'.$link; ?>">
</a>
</article>
 <div class="aa-properties-item-content" >
  <div class="aa-properties-info" style="text-align: center;">
  
    <span>  <?php echo $row['dimensions'];?></span><br>
     <span><a href="<?php echo $row['map'];?>"> <i class="fa fa-map-marker" aria-hidden="true"> <?php echo $row['location'];?></i></a></span>
  </div>
 
  <div class="aa-properties-detial" style="text-align: center;border: 1px solid #ddd;padding: 10px ">
    <a class="aa-secondary-btn" href="property-details.php?id=<?php echo $row['property_id']; ?>">View Details</a>
  </div>
</div>
</li>
<?php

// .img-container end
}//Close the while array loop
echo '<div class="clearfix"></div>';
?>

<p class="ct">
  <?php echo '<h4'.$display.'>Page '; echo $page + 1 .' of '.$pages_total.'</h4>';//Page out of total pages

$i = 1;//Set the $i counting variable to 1

echo '<div id="pageNav"'.$display.'>';//our $display variable will do nothing if more than one page

// Show the page buttons:
if ($page) {
echo '<a href="properties.php"><button><<</button></a>';//Button for first page [<<]
echo '<a href="properties.php?page='.$page_down.'"><button><</button></a>';//Button for previous page [<]
} 

for ($i=1;$i<=$pages_total;$i++) {
if(($i==$page+1)) {
echo '<a href="properties.php?page='.$i.'"><button class="active">'.$i.'</button></a>';//Button for active page, underlined using 'active' class
}

//In this next if statement, calculate how many buttons you'd like to show. You can remove to show only the active button and first, prev, next and last buttons:
if(($i!=$page+1)&&($i<=$page+3)&&($i>=$page-1)) {//This is set for two below and two above the current page
echo '<a href="properties.php?page='.$i.'"><button>'.$i.'</button></a>'; }
} 

if (($page + 1) != $pages_total) {
echo '<a href="properties.php?page='.$page_up.'"><button>></button></a>';//Button for next page [>]
echo '<a href="properties.php?page='.$pages_total.'"><button>>></button></a>';//Button for last page [>>]
}
echo "</div>";// #pageNav end
?>
</p>
  </ul>
    </div>
            <!-- Start properties content bottom -->
           
          </div>
        </div>
        <!-- Start properties sidebar -->
       
        <div class="col-md-4">
          <aside class="aa-properties-sidebar">
            <!-- Start Single properties sidebar -->
            <div class="aa-properties-single-sidebar">
              <form action="property-search.php">
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
              <h3>Latest Lettings</h3>
              <?php
            include "database/connection.php";
            $sql="SELECT link,location,status,map,dimensions,listing,p.property_id FROM photos ph,property p where p.property_id=ph.property_id group by p.property_id order by reg_date DESC limit 3";
              $sql=mysqli_query($conn,$sql);
              while($values = $sql->fetch_assoc()){
                $photo=$values['link'];

               ?>
              <div class="media">
                <div class="media-left">
                  <a href="property-details.php?id=<?php echo $values['property_id']; ?>">
                    <img class="media-object" src="<?php echo 'admin/'.$photo; ?>" alt="img">
                  </a>
                </div>
                <div class="media-body">
                  <h5 class="media-heading"> <a href="property-details.php?id=<?php echo $values['property_id']; ?>"><?php echo $values['dimensions']; ?></a></h5>
                  <p> <span><a href="<?php echo $values['map'];?>" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"> <?php echo $values['location'];?></i></a></span></p>                
                  <span><?php echo $values['listing'];?></span>
                </div>              
              </div>
              <?php } ?>
            </div>
          </aside>
          
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

  </body>
</html>
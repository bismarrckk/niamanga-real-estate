<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Niamanga Limited</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">     

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

   
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body>
  <section id="aa-signin">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-signin-area">
            <div class="aa-signin-form">
              <h2 style="text-align: center;color:#000">Change Password</h3>
              <div class="aa-signin-form-title">
                
                  <?php if(isset($_GET['mismatch'])){?>
                  <div class="alert alert-warning" style="text-align:left">
                   Passwords do not match!
                  </div>
                  <?php } ?>
                   <?php if(isset($_GET['mismatch'])){?>
                  <div class="alert alert-danger" style="text-align:left">
                   Error! Could not update Password
                  </div>
                  <?php } ?>
                  <?php if(isset($_GET['successful'])){?>
                  <div class="alert alert-success" style="text-align:left">
                   Password reset successful!
                  </div>
                  <?php } ?>
              </div><br><br>
              <form class="contactform" method="POST" action="process_data.php">                                                 
                <div class="aa-single-field">
                  <label for="email">New Password <span class="required">*</span></label>
                  <input type="password" required="required" aria-required="true" value="" name="password">
                </div>
                <div class="aa-single-field">
                  <label for="password">Confirm Password <span class="required">*</span></label>
                  <input type="password" name="password2"> 
                </div>
                <div class="aa-single-field">                                                         
                </div> 
                <div class="aa-single-submit">
                  <input type="submit" value="submit" name="submit_new_pass" class="aa-browse-btn" name="submit"><br>
                   <a href="signin.php"><i class="fa fa-sign-in"> Login</i> </a>
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
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
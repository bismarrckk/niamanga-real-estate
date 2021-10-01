<?php
session_start();
if(!isset($_SESSION["data"])){
    header("Location: ../index.php?unauthorized");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Niamanga Ltd</title>
        <link href="css/styles.css" rel="stylesheet" />
         <link href="css/datatable.bootstrap4.css" rel="stylesheet" />
          
          <link href="css/bootstrap.min.css" rel="stylesheet" />
          <link  href="css/all.min.css"  rel="stylesheet" />
          <script src="js/all.min.js"></script>

    </head>
    <body class="sb-nav-fixed" >

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i> Niamanga </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group" style="color:#fff ">
                   <?php
                   include"../database/connection.php";
                    $user_id=$_SESSION["data"]["user_id"];
                    $sql="SELECT user_role FROM users where user_id='$user_id'";
                    $res=$conn->query($sql);
                    while($value=$res->fetch_assoc()){
                        echo strtoupper($value["user_role"]);
                    }

                   ?>
                    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="change_password.php">Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                             <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Properties
                            </a>
                             <a class="nav-link" href="view-images.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                                Photos
                            </a>                                                             
                            <a class="nav-link" href="users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Users
                            </a>
                        
                       
                            
                      
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION["data"]["fullname"];?>
                    </div>
                </nav>
            </div>
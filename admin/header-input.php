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
        <script src="js/all.min.js" ></script>
        <link  href="css/all.min.css"  rel="stylesheet" />
       
    </head>
    <body style="background-image:url('../img/bwbg2.jpg');background-repeat: no-repeat; background-size: cover;
  background-repeat: no-repeat;
  height: 100%;">
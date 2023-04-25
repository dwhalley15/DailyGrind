<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DailyGrind</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../styles/main.css" rel="stylesheet" type="text/css">
    <?php if(isset($_SESSION['theme'])){
             $theme = $_SESSION['theme'];
          }
          else{
             $theme = "default";
          }?>
    <link href="../styles/<?php echo $theme; ?>.css" rel="stylesheet" type="text/css">
  </head>
  <body>
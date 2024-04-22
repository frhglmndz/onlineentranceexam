<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");


 ?>
<?php include("conn.php"); ?>
<!-- HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar  -->
<?php include("includes/sidebar.php"); ?>




<?php 
   @$page = $_GET['page'];


   if($page != '')
   {
     if($page == "exam")
     {
       include("pages/exam.php");
     }
     else if($page == "result")
     {
       include("pages/result.php");
     }
     else if($page == "myscores")
     {
       include("pages/myscores.php");
     }
     
   }
   // 
   else
   {
     include("pages/home.php"); 
   }


 ?> 



<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>



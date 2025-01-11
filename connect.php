<?php
   
   $con=new mysqli('localhost','root', '','library');
   if(!$con){
    die(mysqli_query($con));
   }

?>
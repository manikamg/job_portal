<?php
   session_start();
   unset($_SESSION['client']);
   unset($_SESSION['name']); 
   unset($_SESSION['email']);
   if(session_destroy()) {
      header("Location:../");
   }
?>
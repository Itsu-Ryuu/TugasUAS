<?php 
    if(!isset($_SESSION['is_login']))
    {
        header ("location: login.php");
    }
?>
<?php
    session_start();
    function confirm_login()
    {
        if(!isset($_SESSION['name']))
        {
            header("Location: login.php");
            exit;
        }
    }
?>
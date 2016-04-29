<?php

    if(empty($_SESSION["TYPE"]) || $_SESSION["TYPE"] != "employee")
    {
        logout();
        header("Location: login.php");
    }

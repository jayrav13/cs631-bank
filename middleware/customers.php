<?php

    if(empty($_SESSION["TYPE"]) || $_SESSION["TYPE"] != "customer")
    {
        logout();
        header("Location: login.php");
    }
<?php

    // configuration
    require("../includes/config.php"); 

    if($_SESSION["TYPE"] == "customer")
    {
        header("Location: portfolio.php");
    }
    else if($_SESSION["TYPE"] == "employee")
    {
        header("Location: customers.php");
    }
    else
    {
        header("Location: logout.php");
    }
    

?>

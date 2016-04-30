<?php

    // configuration
    require("../includes/config.php");
    
 	if(isset($_GET["id"])) {
 		 $transactions = CS50::query("SELECT * FROM transactions WHERE AccountNumber = ?", $_GET["id"]);
 	}
    render("accounts.php", ["transactions" => $transactions]);
<?php

    // configuration
    require("../includes/config.php");
    require("../middleware/customers.php");
    
 	if(isset($_GET["id"])) {
 		 $transactions = CS50::query("SELECT * FROM transactions WHERE AccountNumber = ?", $_GET["id"]);
 	}
    render("passbook.php", ["transactions" => $transactions]);
<?php

    // configuration
    require("../includes/config.php");
    require("../middleware/customers.php");
    
 	if(isset($_GET["id"])) {
 		 $transactions = CS50::query("SELECT * FROM transactions WHERE AccountNumber = ?  ORDER BY CreatedAt ASC;", $_GET["id"]);
 		 $customers = CS50::query("SELECT * FROM customers JOIN customer_account ON customers.CustomerSSN = customer_account.CustomerSSN JOIN accounts ON customer_account.AccountNumber = accounts.AccountNumber WHERE accounts.AccountNumber = ? ", $_GET["id"]);
 	}
    render("passbook.php", ["transactions" => $transactions, "customers" => $customers]);
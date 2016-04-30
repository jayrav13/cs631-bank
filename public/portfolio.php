<?php

    // configuration
    require("../includes/config.php");
    require("../includes/functions.php");
    require("../middleware/customers.php");

    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $accounts = CS50::query(file_get_contents("../database/queries/select_customer_accounts.sql"), $user["CustomerSSN"]);
        $transactions = CS50::query(file_get_contents("../database/queries/select_customer_transactions.sql"), $user["CustomerSSN"]);

        render("portfolio.php", ["user" => $user, "accounts" => $accounts, "transactions" => $transactions]);
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["name"]) || empty($_POST["from-account"]) || empty($_POST["to-account"]) || empty($_POST["amount"]))
        {
            header("Location: portfolio.php");
        }
        
        if(intval($_POST["from-account"]) == -1 || intval($_POST["to-account"]) == -1)
        {
            if(intval($_POST["from-account"]) == -1)
            {
                // Deposit
                CS50::query("START TRANSACTION");
                $update = CS50::query("UPDATE accounts SET AccountBalance = AccountBalance + ? WHERE AccountNumber = ?", floatval($_POST["amount"]), $_POST["to-account"]);
                
                if($update == 1)
                {
                    $transac = CS50::query("INSERT INTO transactions (AccountNumber, TransacCode, TransacName, TransacCharge, TransacType, TransacAmount) VALUES (?, ?, ?, ?, ?, ?)", $_POST["to-account"], jr_random(9), $_POST["name"], 0, "CD", floatval($_POST["amount"]));
                    CS50::query("COMMIT");
                }
                else
                {
                    CS50::query("ROLLBACK");
                }

                header("Location: portfolio.php");
            }
            else if(intval($_POST["to-account"]) == -1)
            {
                // Withdrawal
                CS50::query("START TRANSACTION");
                $update = CS50::query("UPDATE accounts SET AccountBalance = AccountBalance - ? WHERE AccountNumber = ?", $_POST["amount"], $_POST["from-account"]);
                if($update == 1)
                {
                    $transac = CS50::query("INSERT INTO transactions (AccountNumber, TransacCode, TransacName, TransacCharge, TransacType, TransacAmount) VALUES (?, ?, ?, ?, ?, ?)", $_POST["from-account"], jr_random(9), $_POST["name"], 0, "CD", -1 * floatval($_POST["amount"]));
                    CS50::query("COMMIT");
                }
                else
                {
                    CS50::query("ROLLBACK");
                }
                    
                header("Location: portfolio.php");
            }
        }
        else
        {
            $account_from = CS50::query("SELECT * FROM accounts WHERE AccountNumber = ?", $_POST["from-account"]);
            $account_to = CS50::query("SELECT * FROM accounts WHERE AccountNumber = ?", $_POST["to-account"]);
        }

        dump($_POST);

    }
    
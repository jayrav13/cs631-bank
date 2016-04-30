<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        logout();
        // else render form
        render("login.php", ["title" => "Log In"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }

        // query database for user
        if($_POST["type"] == "customer")
        {
            $rows = CS50::query("SELECT * FROM customers WHERE CustomerUsername = ?", $_POST["username"]);
        }
        else
        {
            $rows = CS50::query("SELECT * FROM employees WHERE EmpUsername = ?", $_POST["username"]);
        }

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (password_verify($_POST["password"], $row["Password"]))
            {
                // remember that user's now logged in by storing user's ID in session
                if($_POST["type"] == "customer")
                {
                    $_SESSION["TOKEN"] = $row["CustomerSSN"];
                    $_SESSION["TYPE"] = $_POST["type"];
                }
                else if($_POST["type"] == "employee")
                {
                    $_SESSION["TOKEN"] = $row["EmpSSN"];
                    $_SESSION["TYPE"] = $_POST["type"];
                }
                
                // redirect to portfolio
                header("Location: /");
            }
        }

        // else apologize
        apologize("Invalid username and/or password.");
    }

?>

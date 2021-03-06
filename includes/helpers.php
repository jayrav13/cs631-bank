<?php

    /**
     * helpers.php
     *
     * Developed by Harvard University's Computer Science 50 Staff.
     *
     * Helper functions.
     */

    require_once("config.php");

    /**
     * Apologizes to user with message.
     */
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
    }

    /**
     * Facilitates debugging by dumping contents of argument(s)
     * to browser.
     */
    function dump()
    {
        $arguments = func_get_args();
        require("../views/dump.php");
        exit;
    }

    /**
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }

    /**
     * Renders view, passing in values.
     */
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);
            $user = user();

            // render view (between header and footer)
            require("../views/header.php");
            require("../views/{$view}");
            require("../views/footer.php");
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }

    function user()
    {
        if(empty($_SESSION["TOKEN"]))
        {
            return false;
        }
        else
        {
            $rows = NULL;
            if($_SESSION["TYPE"] == "customer")
            {
                $rows = CS50::query("SELECT * FROM customers WHERE CustomerSSN = ?", $_SESSION["TOKEN"]);
            }
            else if($_SESSION["TYPE"] == "employee")
            {
                $rows = CS50::query("SELECT * FROM employees WHERE EmpSSN = ?", $_SESSION["TOKEN"]);
            }
            if(count($rows) == 1)
            {
                return $rows[0];
            }
            else
            {
                return false;
            }
        }
    }
?>

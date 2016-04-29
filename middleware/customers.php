<?php

    if(!array_key_exists("CustomerSSN", $user))
    {
        logout();
        header("Location: login.php");
    }
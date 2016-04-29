<?php

    if(!array_key_exists("EmpSSN", $user))
    {
        logout();
        header("Location: /");
    }

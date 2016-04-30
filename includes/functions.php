<?php

    function jr_random($digits)
    {
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
    }


?>
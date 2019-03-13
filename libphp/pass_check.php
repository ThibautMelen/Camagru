<?php

function pass_check($pass)
{
    if (strlen($pass) < 8)
        return false;
    else if (!preg_match('/[0-9]+/', $pass))
        return false;
    else if (!preg_match('/[a-z]+/', $pass))
        return false;
    else if (!preg_match('/[A-Z]+/', $pass))
        return false;
    else if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+!-]/', $pass))
        return false;
    return true;
}


?>
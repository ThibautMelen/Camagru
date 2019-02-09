<?php

function islog()
{
    if (isset($_SESSION['id']) && isset($_SESSION['pseudo']) && isset($_SESSION['email']))
        return (true);
    return (false);
}

?>